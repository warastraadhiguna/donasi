<?php

namespace App\Models;

use App\Policies\HmiProfilePolicy;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

#[UsePolicy(HmiProfilePolicy::class)]
#[Fillable([
    'organization_name',
    'header_tagline',
    'contact_email',
    'instagram_url',
    'facebook_url',
    'youtube_url',
    'whatsapp_url',
    'footer_description',
    'contact_team_name',
    'contact_team_role',
    'contact_address',
    'contact_support_text',
    'transfer_bank_name',
    'transfer_account_number',
    'transfer_account_holder',
    'qris_image',
])]
class HmiProfile extends Model
{
    protected $attributes = [
        'organization_name' => 'HMI Peduli',
        'header_tagline' => 'Gerakan charity untuk pendidikan, pangan, dan kesehatan',
        'contact_email' => 'halo@hmipeduli.org',
        'instagram_url' => '',
        'facebook_url' => '',
        'youtube_url' => '',
        'whatsapp_url' => '',
        'footer_description' => 'HMI Peduli untuk pendidikan, pangan, kesehatan, dan aksi kemanusiaan',
        'contact_team_name' => 'Tim HMI Peduli',
        'contact_team_role' => 'Kolaborasi, bantuan, dan donasi',
        'contact_address' => 'Menjangkau komunitas dan penerima manfaat di berbagai wilayah Indonesia',
        'contact_support_text' => 'Siap untuk kampanye donasi, relawan, dan kemitraan sosial',
        'transfer_bank_name' => 'Bank BCA',
        'transfer_account_number' => '1234567890',
        'transfer_account_holder' => 'HMI Peduli Indonesia',
        'qris_image' => '',
    ];

    protected static ?self $current = null;

    public function getQrisImageUrlAttribute(): string
    {
        return $this->resolveMediaUrl($this->qris_image);
    }

    public function getWhatsappUrlAttribute(?string $value): string
    {
        return $this->extractWhatsappNumber($value);
    }

    public function setWhatsappUrlAttribute(?string $value): void
    {
        $this->attributes['whatsapp_url'] = $this->extractWhatsappNumber($value);
    }

    public function getWhatsappLinkAttribute(): string
    {
        $number = $this->normalizeWhatsappNumberForLink($this->attributes['whatsapp_url'] ?? null);

        if (blank($number)) {
            return '';
        }

        return 'https://wa.me/' . $number;
    }

    public function getWhatsappDisplayAttribute(): string
    {
        $number = $this->extractWhatsappNumber($this->attributes['whatsapp_url'] ?? null);

        if (blank($number)) {
            return '';
        }

        if (str_starts_with($number, '62')) {
            $rest = substr($number, 2);

            return trim('+62 ' . implode(' ', array_filter([
                substr($rest, 0, 3) ?: null,
                substr($rest, 3, 4) ?: null,
                substr($rest, 7) ?: null,
            ])));
        }

        return implode(' ', array_filter([
            substr($number, 0, 4) ?: null,
            substr($number, 4, 4) ?: null,
            substr($number, 8) ?: null,
        ]));
    }

    public static function current(): self
    {
        if (static::$current instanceof self) {
            return static::$current;
        }

        $instance = new self();

        if (! Schema::hasTable($instance->getTable())) {
            return static::$current = $instance;
        }

        return static::$current = static::query()->first() ?? $instance;
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

    protected function extractWhatsappNumber(?string $value): string
    {
        if (blank($value)) {
            return '';
        }

        $value = trim((string) $value);

        if (filter_var($value, FILTER_VALIDATE_URL) || str_contains($value, 'wa.me') || str_contains($value, 'whatsapp.com')) {
            $parsedUrl = parse_url($value);

            if (filled($parsedUrl['query'] ?? null)) {
                parse_str((string) $parsedUrl['query'], $query);

                if (filled($query['phone'] ?? null)) {
                    return preg_replace('/\D+/', '', (string) $query['phone']) ?: '';
                }
            }

            if (filled($parsedUrl['path'] ?? null)) {
                $pathDigits = preg_replace('/\D+/', '', (string) $parsedUrl['path']);

                if (filled($pathDigits)) {
                    return $pathDigits;
                }
            }
        }

        return preg_replace('/\D+/', '', $value) ?: '';
    }

    protected function normalizeWhatsappNumberForLink(?string $value): string
    {
        $number = $this->extractWhatsappNumber($value);

        if (blank($number)) {
            return '';
        }

        if (str_starts_with($number, '0')) {
            return '62' . substr($number, 1);
        }

        if (str_starts_with($number, '62')) {
            return $number;
        }

        if (str_starts_with($number, '8')) {
            return '62' . $number;
        }

        return $number;
    }
}
