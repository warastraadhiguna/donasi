<?php

namespace Database\Seeders;

use App\Models\HmiProfile;
use Illuminate\Database\Seeder;

class HmiProfileSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        HmiProfile::query()->updateOrCreate(
            ['id' => 1],
            [
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
                'qris_image' => null,
            ],
        );
    }
}
