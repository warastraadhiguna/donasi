<?php

namespace App\Models;

use App\Policies\WebsiteContentPolicy;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

#[UsePolicy(WebsiteContentPolicy::class)]
#[Fillable([
    'hero_background_image',
    'hero_eyebrow',
    'hero_title',
    'hero_description',
    'hero_note_1',
    'hero_note_2',
    'hero_note_3',
    'hero_focus_title',
    'hero_focus_1_label',
    'hero_focus_1_value',
    'hero_focus_2_label',
    'hero_focus_2_value',
    'hero_focus_3_label',
    'hero_focus_3_value',
    'hero_focus_4_label',
    'hero_focus_4_value',
    'movement_title',
    'movement_items',
    'feature_1_text',
    'feature_2_text',
    'feature_3_text',
    'feature_4_text',
    'about_image',
    'about_badge',
    'about_title',
    'about_description',
    'about_principle_title',
    'about_principle_1',
    'about_principle_2',
    'about_metric_1_value',
    'about_metric_1_text',
    'about_metric_2_value',
    'about_metric_2_text',
    'impact_1_value',
    'impact_1_text',
    'impact_2_value',
    'impact_2_text',
    'impact_3_value',
    'impact_3_text',
    'volunteer_title',
    'volunteer_form_title',
    'volunteer_reason_badge',
    'volunteer_reason_title',
    'volunteer_reason_description',
    'contact_form_title',
    'contact_form_description',
])]
class WebsiteContent extends Model
{
    protected $attributes = [
        'hero_background_image' => null,
        'hero_eyebrow' => 'Bersama bantu lebih banyak orang',
        'hero_title' => 'Donasi yang terarah untuk dampak yang nyata.',
        'hero_description' => 'HMI Peduli menghubungkan donatur, relawan, dan program sosial agar bantuan untuk pendidikan, kebutuhan pangan, kesehatan, dan respon darurat bisa bergerak lebih cepat.',
        'hero_note_1' => 'Program terkurasi',
        'hero_note_2' => 'Laporan dampak berkala',
        'hero_note_3' => 'Terbuka untuk relawan',
        'hero_focus_title' => 'Donasi yang kami dorong di halaman ini',
        'hero_focus_1_label' => 'Pendidikan anak',
        'hero_focus_1_value' => '35%',
        'hero_focus_2_label' => 'Paket pangan',
        'hero_focus_2_value' => '28%',
        'hero_focus_3_label' => 'Kesehatan komunitas',
        'hero_focus_3_value' => '22%',
        'hero_focus_4_label' => 'Respon darurat',
        'hero_focus_4_value' => '15%',
        'movement_title' => 'Cara sederhana untuk ikut bergerak',
        'feature_1_text' => 'Gabung jadi relawan',
        'feature_2_text' => 'Dukung program sosial',
        'feature_3_text' => 'Salurkan donasi',
        'feature_4_text' => 'Buka kolaborasi',
        'about_image' => null,
        'about_badge' => 'Tentang Kami',
        'about_title' => 'HMI Peduli hadir untuk membuat bantuan lebih dekat dan lebih cepat.',
        'about_description' => 'Kami membangun halaman charity yang fokus pada kebutuhan yang paling sering mendesak: bantuan pendidikan, paket kebutuhan pokok, dukungan kesehatan, dan respon cepat saat situasi darurat.',
        'about_principle_title' => 'Visi dan Misi',
        'about_principle_1' => 'Program diprioritaskan berdasar kebutuhan lapangan',
        'about_principle_2' => 'Pembaruan dan progress dibuat ringkas serta jelas',
        'about_metric_1_value' => '2026',
        'about_metric_1_text' => 'Tahun gerakan digital ini dimulai',
        'about_metric_2_value' => '12+',
        'about_metric_2_text' => 'Kolaborasi komunitas yang sedang dijalankan',
        'impact_1_value' => '150+',
        'impact_1_text' => 'Keluarga dan penerima manfaat yang didampingi lewat distribusi bantuan awal.',
        'impact_2_value' => '24',
        'impact_2_text' => 'Aksi kolaborasi komunitas, kampus, dan relawan untuk kegiatan sosial lapangan.',
        'impact_3_value' => '100%',
        'impact_3_text' => 'Fokus pada penyaluran terukur, transparan, dan mudah dipahami donatur.',
        'volunteer_title' => 'Relawan adalah penggerak di balik setiap aksi.',
        'volunteer_form_title' => 'Daftar relawan HMI Peduli',
        'volunteer_reason_badge' => 'Kenapa ikut?',
        'volunteer_reason_title' => 'Peran relawan bukan hanya hadir, tapi memastikan bantuan sampai dengan baik.',
        'volunteer_reason_description' => 'Kami membuka ruang kontribusi untuk tim lapangan, penggalangan dana, kemitraan, dokumentasi, dan publikasi kegiatan sosial.',
        'contact_form_title' => 'Kirim pesan',
        'contact_form_description' => 'Untuk kerja sama atau pertanyaan umum, kamu juga bisa email ke :email.',
    ];

    protected static ?self $current = null;

    public function getMovementItemsAttribute(mixed $value): array
    {
        if (is_array($value)) {
            return $this->sanitizeMovementItems($value);
        }

        if (filled($value)) {
            $decoded = json_decode((string) $value, true);

            if (is_array($decoded)) {
                return $this->sanitizeMovementItems($decoded);
            }
        }

        return $this->legacyMovementItems();
    }

    public function setMovementItemsAttribute(mixed $value): void
    {
        if (blank($value)) {
            $this->attributes['movement_items'] = null;

            return;
        }

        $items = is_array($value) ? $value : [];

        $this->attributes['movement_items'] = json_encode(
            $this->sanitizeMovementItems($items),
            JSON_UNESCAPED_UNICODE,
        );
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

    public function getHeroBackgroundImageUrlAttribute(): string
    {
        return $this->resolveImageUrl(
            $this->hero_background_image,
            'images/slide/volunteer-helping-with-donation-box.jpg',
        );
    }

    public function getAboutImageUrlAttribute(): string
    {
        return $this->resolveImageUrl(
            $this->about_image,
            'images/group-people-volunteering-foodbank-poor-people.jpg',
        );
    }

    protected function resolveImageUrl(?string $path, string $fallback): string
    {
        if (filled($path)) {
            if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://') || str_starts_with($path, '/')) {
                return $path;
            }

            if (Storage::disk('public')->exists($path)) {
                return Storage::url($path);
            }

            return asset($path);
        }

        return asset($fallback);
    }

    protected function legacyMovementItems(): array
    {
        return $this->sanitizeMovementItems([
            [
                'text' => $this->attributes['feature_1_text'] ?? 'Gabung jadi relawan',
                'icon' => 'images/icons/hands.png',
                'link' => '/donasi',
            ],
            [
                'text' => $this->attributes['feature_2_text'] ?? 'Dukung program sosial',
                'icon' => 'images/icons/heart.png',
                'link' => '#program',
            ],
            [
                'text' => $this->attributes['feature_3_text'] ?? 'Salurkan donasi',
                'icon' => 'images/icons/receive.png',
                'link' => '/donasi',
            ],
            [
                'text' => $this->attributes['feature_4_text'] ?? 'Buka kolaborasi',
                'icon' => 'images/icons/scholarship.png',
                'link' => '#kontak',
            ],
        ]);
    }

    protected function sanitizeMovementItems(array $items): array
    {
        return collect($items)
            ->map(function (mixed $item): ?array {
                if (! is_array($item)) {
                    return null;
                }

                $text = trim((string) ($item['text'] ?? ''));
                $icon = trim((string) ($item['icon'] ?? ''));
                $link = trim((string) ($item['link'] ?? ''));

                if (blank($text)) {
                    return null;
                }

                return [
                    'text' => $text,
                    'icon' => filled($icon) ? $icon : 'images/icons/heart.png',
                    'link' => filled($link) ? $link : '/donasi',
                ];
            })
            ->filter()
            ->values()
            ->all();
    }
}
