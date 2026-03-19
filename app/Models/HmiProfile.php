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
}
