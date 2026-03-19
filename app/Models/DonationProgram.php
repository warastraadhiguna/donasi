<?php

namespace App\Models;

use App\Policies\DonationProgramPolicy;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

#[UsePolicy(DonationProgramPolicy::class)]
#[Fillable([
    'title',
    'slug',
    'summary',
    'lead',
    'description',
    'quote',
    'hero_image',
    'target_amount',
    'start_date',
    'end_date',
    'categories',
    'status',
    'focus',
    'gallery',
    'is_featured',
    'sort_order',
])]
class DonationProgram extends Model
{
    protected $attributes = [
        'target_amount' => 0,
        'status' => 'Aktif',
        'is_featured' => false,
        'sort_order' => 0,
    ];

    protected static function booted(): void
    {
        static::saving(function (self $program): void {
            if (blank($program->slug) && filled($program->title)) {
                $program->slug = Str::slug($program->title);
            }
        });
    }

    protected function casts(): array
    {
        return [
            'categories' => 'array',
            'description' => 'array',
            'focus' => 'array',
            'gallery' => 'array',
            'target_amount' => 'integer',
            'start_date' => 'date',
            'end_date' => 'date',
            'is_featured' => 'boolean',
        ];
    }

    public function donationDetails(): HasMany
    {
        return $this->hasMany(DonationDetail::class);
    }

    public function verifiedDonationDetails(): HasMany
    {
        return $this->hasMany(DonationDetail::class)->verified();
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getReceivedAmountAttribute(): int
    {
        if (array_key_exists('verified_donation_details_sum_amount', $this->attributes)) {
            return (int) ($this->attributes['verified_donation_details_sum_amount'] ?? 0);
        }

        if ($this->relationLoaded('verifiedDonationDetails')) {
            return (int) $this->verifiedDonationDetails->sum('amount');
        }

        return (int) $this->verifiedDonationDetails()->sum('amount');
    }

    public function getRemainingAmountAttribute(): int
    {
        return max($this->target_amount - $this->received_amount, 0);
    }

    public function getProgressPercentageAttribute(): int
    {
        if ($this->target_amount <= 0) {
            return 0;
        }

        return min((int) round(($this->received_amount / $this->target_amount) * 100), 100);
    }

    public function getProgressLabelAttribute(): string
    {
        return $this->progress_percentage . '%';
    }

    public function getHeroImageUrlAttribute(): string
    {
        return $this->resolveMediaUrl($this->hero_image);
    }

    public function getFormattedTargetAmountAttribute(): string
    {
        return 'Rp' . number_format($this->target_amount, 0, ',', '.');
    }

    public function getFormattedReceivedAmountAttribute(): string
    {
        return 'Rp' . number_format($this->received_amount, 0, ',', '.');
    }

    public function getFormattedRemainingAmountAttribute(): string
    {
        return 'Rp' . number_format($this->remaining_amount, 0, ',', '.');
    }

    public function getRemainingDaysAttribute(): ?int
    {
        if (! $this->end_date) {
            return null;
        }

        return Carbon::today()->diffInDays($this->end_date, false);
    }

    public function getRemainingDaysLabelAttribute(): string
    {
        if ($this->remaining_days === null) {
            return 'Tanpa batas akhir';
        }

        if ($this->remaining_days < 0) {
            return 'Berakhir';
        }

        if ($this->remaining_days === 0) {
            return 'Berakhir hari ini';
        }

        return 'Sisa ' . $this->remaining_days . ' hari';
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query
            ->orderBy('sort_order')
            ->orderBy('title');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    protected function resolveMediaUrl(?string $path): string
    {
        if (blank($path)) {
            return '';
        }

        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }

        $trimmedPath = ltrim($path, '/');
        $decodedPath = rawurldecode($trimmedPath);

        if (file_exists(public_path($decodedPath))) {
            return '/' . $trimmedPath;
        }

        return Storage::disk('public')->url($trimmedPath);
    }

    public function toViewData(): array
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'categories' => collect($this->categories)->filter()->values()->all(),
            'progress' => $this->progress_label,
            'progress_percentage' => $this->progress_percentage,
            'status' => $this->status,
            'summary' => $this->summary,
            'lead' => $this->lead,
            'description' => collect($this->description)
                ->map(fn (mixed $item): string => is_array($item) ? ($item['body'] ?? '') : (string) $item)
                ->filter()
                ->values()
                ->all(),
            'quote' => $this->quote,
            'hero_image' => $this->hero_image_url,
            'gallery' => collect($this->gallery)
                ->map(function (mixed $item): mixed {
                    if (is_string($item)) {
                        return $this->resolveMediaUrl($item);
                    }

                    if (! is_array($item)) {
                        return null;
                    }

                    return [
                        'type' => $item['type'] ?? 'image',
                        'src' => $this->resolveMediaUrl((string) ($item['src'] ?? '')),
                        'thumb' => isset($item['thumb']) ? $this->resolveMediaUrl((string) $item['thumb']) : null,
                        'poster' => isset($item['poster']) ? $this->resolveMediaUrl((string) $item['poster']) : null,
                    ];
                })
                ->filter(function (mixed $item): bool {
                    if (is_string($item)) {
                        return filled($item);
                    }

                    return is_array($item) && filled($item['src'] ?? null);
                })
                ->values()
                ->all(),
            'focus' => collect($this->focus)->filter()->values()->all(),
            'target_amount' => $this->formatted_target_amount,
            'received_amount' => $this->formatted_received_amount,
            'remaining_amount' => $this->formatted_remaining_amount,
            'start_date' => $this->start_date?->format('d M Y'),
            'end_date' => $this->end_date?->format('d M Y'),
            'remaining_days' => $this->remaining_days,
            'remaining_days_label' => $this->remaining_days_label,
        ];
    }
}
