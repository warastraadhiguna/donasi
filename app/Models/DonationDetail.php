<?php

namespace App\Models;

use App\Policies\DonationDetailPolicy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

#[UsePolicy(DonationDetailPolicy::class)]
#[Fillable([
    'donation_program_id',
    'donor_name',
    'donor_whatsapp',
    'amount',
    'donated_at',
    'payment_method',
    'payment_proof_path',
    'input_source',
    'note',
    'is_verified',
    'verified_at',
    'verified_by',
])]
class DonationDetail extends Model
{
    protected function casts(): array
    {
        return [
            'amount' => 'integer',
            'donated_at' => 'date',
            'is_verified' => 'boolean',
            'verified_at' => 'datetime',
        ];
    }

    public function donationProgram(): BelongsTo
    {
        return $this->belongsTo(DonationProgram::class);
    }

    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function scopeVerified(Builder $query): Builder
    {
        return $query->where('is_verified', true);
    }

    public function getPaymentProofUrlAttribute(): ?string
    {
        if (blank($this->payment_proof_path)) {
            return null;
        }

        if (filter_var($this->payment_proof_path, FILTER_VALIDATE_URL)) {
            return $this->payment_proof_path;
        }

        return Storage::disk('public')->url($this->payment_proof_path);
    }

    public function getPaymentProofExtensionAttribute(): ?string
    {
        if (blank($this->payment_proof_path)) {
            return null;
        }

        return strtolower(pathinfo((string) $this->payment_proof_path, PATHINFO_EXTENSION));
    }

    public function getPaymentProofIsImageAttribute(): bool
    {
        return in_array($this->payment_proof_extension, ['jpg', 'jpeg', 'png', 'webp'], true);
    }

    public function getPaymentProofIsPdfAttribute(): bool
    {
        return $this->payment_proof_extension === 'pdf';
    }
}
