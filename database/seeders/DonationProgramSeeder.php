<?php

namespace Database\Seeders;

use App\Models\DonationDetail;
use App\Models\DonationProgram;
use Illuminate\Database\Seeder;

class DonationProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'title' => 'Beasiswa & Perlengkapan Sekolah',
                'slug' => 'beasiswa-perlengkapan-sekolah',
                'summary' => 'Membantu biaya dasar sekolah, perlengkapan belajar, buku, dan kebutuhan pendidikan untuk anak-anak dari keluarga rentan.',
                'lead' => 'Ruang donasi ini difokuskan untuk menjaga agar anak-anak tetap bisa belajar dengan tenang, memiliki perlengkapan sekolah yang layak, dan tidak tertinggal karena keterbatasan ekonomi.',
                'description' => [
                    ['body' => 'Dana yang terkumpul diarahkan untuk kebutuhan yang paling mendasar seperti seragam, alat tulis, buku pelajaran, tas sekolah, dan bantuan biaya pendidikan ringan yang mendesak.'],
                    ['body' => 'Selain dukungan material, program ini juga membuka peluang kolaborasi dengan relawan dan komunitas lokal agar bantuan pendidikan bisa tepat sasaran dan terpantau dengan lebih baik.'],
                ],
                'quote' => 'Setiap dukungan kecil untuk pendidikan bisa menjaga satu anak tetap berada di ruang belajar, bukan berhenti di tengah jalan.',
                'hero_image' => 'images/causes/group-african-kids-paying-attention-class.jpg',
                'target_amount' => 10000000,
                'start_date' => '2026-03-01',
                'end_date' => '2026-04-15',
                'categories' => ['Pendidikan', 'Anak'],
                'status' => 'Aktif',
                'focus' => [
                    'Perlengkapan sekolah dasar dan menengah',
                    'Buku dan alat belajar harian',
                    'Dukungan biaya pendidikan yang mendesak',
                ],
                'gallery' => [
                    [
                        'type' => 'video',
                        'src' => 'contoh%20video.mp4',
                        'poster' => 'images/causes/group-african-kids-paying-attention-class.jpg',
                        'thumb' => 'images/causes/group-african-kids-paying-attention-class.jpg',
                    ],
                    [
                        'type' => 'image',
                        'src' => 'images/group-people-volunteering-foodbank-poor-people.jpg',
                        'thumb' => 'images/group-people-volunteering-foodbank-poor-people.jpg',
                    ],
                    [
                        'type' => 'image',
                        'src' => 'images/smiling-casual-woman-dressed-volunteer-t-shirt-with-badge.jpg',
                        'thumb' => 'images/smiling-casual-woman-dressed-volunteer-t-shirt-with-badge.jpg',
                    ],
                ],
                'is_featured' => true,
                'sort_order' => 1,
                'donations' => [
                    [
                        'donor_name' => 'Rizki Pratama',
                        'donor_whatsapp' => '081234567801',
                        'amount' => 2500000,
                        'donated_at' => '2026-03-03',
                        'payment_method' => 'Transfer',
                        'note' => 'Donasi tahap pertama untuk perlengkapan sekolah.',
                    ],
                    [
                        'donor_name' => 'Komunitas Muda Peduli',
                        'donor_whatsapp' => '081234567802',
                        'amount' => 3000000,
                        'donated_at' => '2026-03-09',
                        'payment_method' => 'Transfer',
                        'note' => 'Kolaborasi komunitas pendidikan.',
                    ],
                    [
                        'donor_name' => 'Siti Rahma',
                        'donor_whatsapp' => '081234567803',
                        'amount' => 2000000,
                        'donated_at' => '2026-03-14',
                        'payment_method' => 'E-wallet',
                        'note' => 'Dukungan untuk buku dan alat tulis.',
                    ],
                ],
            ],
            [
                'title' => 'Paket Pangan Keluarga',
                'slug' => 'paket-pangan-keluarga',
                'summary' => 'Penyaluran sembako dan kebutuhan harian untuk keluarga yang sedang menghadapi tekanan ekonomi dan membutuhkan bantuan cepat.',
                'lead' => 'Ruang donasi pangan dibuat agar keluarga yang sedang berada dalam kondisi paling rentan tetap memiliki akses terhadap kebutuhan pokok sehari-hari.',
                'description' => [
                    ['body' => 'Isi bantuan difokuskan pada sembako utama, bahan pangan tahan simpan, kebutuhan nutrisi dasar, dan dukungan logistik distribusi agar bantuan bisa diterima tanpa jeda yang terlalu lama.'],
                    ['body' => 'Program ini juga membuka kolaborasi distribusi bersama komunitas dan relawan lapangan untuk menjangkau keluarga yang sering kali luput dari bantuan formal.'],
                ],
                'quote' => 'Ketika dapur tetap menyala, keluarga memiliki ruang bernapas untuk bangkit lagi.',
                'hero_image' => 'images/causes/poor-child-landfill-looks-forward-with-hope.jpg',
                'target_amount' => 12000000,
                'start_date' => '2026-03-04',
                'end_date' => '2026-04-05',
                'categories' => ['Pangan', 'Keluarga'],
                'status' => 'Aktif',
                'focus' => [
                    'Paket sembako bulanan',
                    'Kebutuhan pangan darurat',
                    'Distribusi cepat untuk keluarga rentan',
                ],
                'gallery' => [
                    [
                        'type' => 'image',
                        'src' => 'images/slide/medium-shot-people-collecting-donations.jpg',
                        'thumb' => 'images/slide/medium-shot-people-collecting-donations.jpg',
                    ],
                    [
                        'type' => 'image',
                        'src' => 'images/slide/volunteer-helping-with-donation-box.jpg',
                        'thumb' => 'images/slide/volunteer-helping-with-donation-box.jpg',
                    ],
                ],
                'is_featured' => true,
                'sort_order' => 2,
                'donations' => [
                    [
                        'donor_name' => 'Dapur Bersama',
                        'donor_whatsapp' => '081234567804',
                        'amount' => 2500000,
                        'donated_at' => '2026-03-06',
                        'payment_method' => 'Transfer',
                        'note' => 'Paket pangan untuk 25 keluarga.',
                    ],
                    [
                        'donor_name' => 'Aulia H.',
                        'donor_whatsapp' => '081234567805',
                        'amount' => 1500000,
                        'donated_at' => '2026-03-10',
                        'payment_method' => 'E-wallet',
                        'note' => 'Bantuan sembako.',
                    ],
                    [
                        'donor_name' => 'Sahabat HMI',
                        'donor_whatsapp' => '081234567806',
                        'amount' => 2000000,
                        'donated_at' => '2026-03-16',
                        'payment_method' => 'Transfer',
                        'note' => 'Donasi kolektif keluarga rentan.',
                    ],
                ],
            ],
            [
                'title' => 'Layanan Kesehatan Dasar',
                'slug' => 'layanan-kesehatan-dasar',
                'summary' => 'Dukungan obat, pemeriksaan awal, dan kebutuhan kesehatan untuk kelompok masyarakat yang sulit menjangkau layanan medis dasar.',
                'lead' => 'Ruang donasi kesehatan hadir untuk memastikan kebutuhan medis dasar tetap terjangkau, terutama bagi komunitas yang akses layanannya terbatas.',
                'description' => [
                    ['body' => 'Dukungan digunakan untuk pemeriksaan awal, obat-obatan dasar, alat kesehatan sederhana, dan kebutuhan penanganan awal bagi kelompok rentan di lapangan.'],
                    ['body' => 'Dengan bantuan yang terarah, komunitas bisa memperoleh akses kesehatan yang lebih cepat sambil menunggu penanganan lanjutan dari fasilitas kesehatan formal.'],
                ],
                'quote' => 'Bantuan kesehatan yang datang tepat waktu sering kali menjadi pembeda antara menunggu dan benar-benar tertolong.',
                'hero_image' => 'images/causes/african-woman-pouring-water-recipient-outdoors.jpg',
                'target_amount' => 8000000,
                'start_date' => '2026-03-02',
                'end_date' => '2026-03-25',
                'categories' => ['Kesehatan', 'Komunitas'],
                'status' => 'Tercapai',
                'focus' => [
                    'Obat dan kebutuhan medis dasar',
                    'Pemeriksaan awal komunitas',
                    'Dukungan kesehatan untuk kelompok rentan',
                ],
                'gallery' => [
                    [
                        'type' => 'image',
                        'src' => 'images/different-people-doing-volunteer-work.jpg',
                        'thumb' => 'images/different-people-doing-volunteer-work.jpg',
                    ],
                    [
                        'type' => 'image',
                        'src' => 'images/portrait-volunteer-who-organized-donations-charity.jpg',
                        'thumb' => 'images/portrait-volunteer-who-organized-donations-charity.jpg',
                    ],
                ],
                'is_featured' => true,
                'sort_order' => 3,
                'donations' => [
                    [
                        'donor_name' => 'Klinik Sehat Bersama',
                        'donor_whatsapp' => '081234567807',
                        'amount' => 3000000,
                        'donated_at' => '2026-03-05',
                        'payment_method' => 'Transfer',
                        'note' => 'Dukungan alat kesehatan dasar.',
                    ],
                    [
                        'donor_name' => 'Nadia P.',
                        'donor_whatsapp' => '081234567808',
                        'amount' => 2000000,
                        'donated_at' => '2026-03-08',
                        'payment_method' => 'Transfer',
                        'note' => 'Obat-obatan dasar.',
                    ],
                    [
                        'donor_name' => 'Gerakan Peduli Kampung',
                        'donor_whatsapp' => '081234567809',
                        'amount' => 3000000,
                        'donated_at' => '2026-03-15',
                        'payment_method' => 'E-wallet',
                        'note' => 'Pemeriksaan awal komunitas.',
                    ],
                ],
            ],
            [
                'title' => 'Respon Darurat & Bantuan Cepat',
                'slug' => 'respon-darurat-bantuan-cepat',
                'summary' => 'Ruang donasi untuk kebutuhan cepat saat terjadi situasi mendesak seperti bencana, kebutuhan pengungsian, atau distribusi bantuan kilat.',
                'lead' => 'Program darurat dibuat untuk menjaga respons bantuan tetap cepat, fleksibel, dan bisa bergerak segera ketika kebutuhan lapangan berubah dalam hitungan jam.',
                'description' => [
                    ['body' => 'Dana diarahkan untuk logistik pengungsian, distribusi makanan siap saji, kebutuhan kebersihan, dan perlengkapan awal bagi keluarga terdampak.'],
                    ['body' => 'Kolaborasi dengan relawan lapangan dan komunitas setempat menjadi bagian penting agar bantuan benar-benar sampai ke lokasi prioritas.'],
                ],
                'quote' => 'Dalam situasi darurat, kecepatan bantuan sering kali sama pentingnya dengan besarnya bantuan.',
                'hero_image' => 'images/slide/volunteer-helping-with-donation-box.jpg',
                'target_amount' => 15000000,
                'start_date' => '2026-03-07',
                'end_date' => '2026-04-10',
                'categories' => ['Darurat', 'Kemanusiaan'],
                'status' => 'Aktif',
                'focus' => [
                    'Kebutuhan pengungsian awal',
                    'Paket bantuan cepat',
                    'Distribusi lapangan darurat',
                ],
                'gallery' => [
                    [
                        'type' => 'image',
                        'src' => 'images/slide/volunteer-helping-with-donation-box.jpg',
                        'thumb' => 'images/slide/volunteer-helping-with-donation-box.jpg',
                    ],
                    [
                        'type' => 'image',
                        'src' => 'images/slide/medium-shot-people-collecting-donations.jpg',
                        'thumb' => 'images/slide/medium-shot-people-collecting-donations.jpg',
                    ],
                ],
                'is_featured' => false,
                'sort_order' => 4,
                'donations' => [
                    [
                        'donor_name' => 'Cepat Tanggap Nusantara',
                        'donor_whatsapp' => '081234567810',
                        'amount' => 2000000,
                        'donated_at' => '2026-03-08',
                        'payment_method' => 'Transfer',
                        'note' => 'Bantuan awal bencana.',
                    ],
                    [
                        'donor_name' => 'Donatur Anonim',
                        'donor_whatsapp' => null,
                        'amount' => 1750000,
                        'donated_at' => '2026-03-11',
                        'payment_method' => 'Transfer',
                        'note' => 'Dukungan logistik cepat.',
                    ],
                    [
                        'donor_name' => 'Solidaritas Pemuda',
                        'donor_whatsapp' => '081234567811',
                        'amount' => 1500000,
                        'donated_at' => '2026-03-17',
                        'payment_method' => 'E-wallet',
                        'note' => 'Bantuan pengungsian.',
                    ],
                ],
            ],
            [
                'title' => 'Paket Logistik & Perlengkapan Darurat',
                'slug' => 'paket-logistik-perlengkapan-darurat',
                'summary' => 'Menyediakan perlengkapan pokok, paket higienitas, selimut, dan logistik awal untuk keluarga terdampak situasi darurat.',
                'lead' => 'Ruang donasi logistik membantu memastikan kebutuhan dasar yang paling cepat habis di lapangan bisa tetap tersedia saat distribusi berlangsung.',
                'description' => [
                    ['body' => 'Program ini memfokuskan bantuan pada paket higienitas, selimut, perlengkapan tidur sederhana, serta logistik pokok yang dibutuhkan keluarga pada fase awal darurat.'],
                    ['body' => 'Dukungan dari donatur memperkuat kecepatan packing, distribusi, dan pengadaan ulang perlengkapan yang langsung terpakai di lapangan.'],
                ],
                'quote' => 'Perlengkapan dasar yang tersedia tepat waktu membantu keluarga bertahan lebih tenang di masa paling sulit.',
                'hero_image' => 'images/slide/volunteer-selecting-organizing-clothes-donations-charity.jpg',
                'target_amount' => 10000000,
                'start_date' => '2026-03-05',
                'end_date' => '2026-04-12',
                'categories' => ['Logistik', 'Bantuan'],
                'status' => 'Aktif',
                'focus' => [
                    'Perlengkapan higienitas',
                    'Selimut dan kebutuhan darurat',
                    'Logistik distribusi awal',
                ],
                'gallery' => [
                    [
                        'type' => 'image',
                        'src' => 'images/slide/volunteer-selecting-organizing-clothes-donations-charity.jpg',
                        'thumb' => 'images/slide/volunteer-selecting-organizing-clothes-donations-charity.jpg',
                    ],
                    [
                        'type' => 'image',
                        'src' => 'images/different-people-doing-volunteer-work.jpg',
                        'thumb' => 'images/different-people-doing-volunteer-work.jpg',
                    ],
                ],
                'is_featured' => false,
                'sort_order' => 5,
                'donations' => [
                    [
                        'donor_name' => 'Logistik Peduli',
                        'donor_whatsapp' => '081234567812',
                        'amount' => 2500000,
                        'donated_at' => '2026-03-07',
                        'payment_method' => 'Transfer',
                        'note' => 'Paket higienitas.',
                    ],
                    [
                        'donor_name' => 'Fajar M.',
                        'donor_whatsapp' => '081234567813',
                        'amount' => 1700000,
                        'donated_at' => '2026-03-12',
                        'payment_method' => 'E-wallet',
                        'note' => 'Selimut dan perlengkapan darurat.',
                    ],
                    [
                        'donor_name' => 'Gerakan Bantu Sesama',
                        'donor_whatsapp' => '081234567814',
                        'amount' => 2000000,
                        'donated_at' => '2026-03-16',
                        'payment_method' => 'Transfer',
                        'note' => 'Pengadaan logistik lapangan.',
                    ],
                ],
            ],
            [
                'title' => 'Pemberdayaan Komunitas & Relawan',
                'slug' => 'pemberdayaan-komunitas-relawan',
                'summary' => 'Ruang donasi untuk pelatihan relawan, dukungan komunitas lokal, dan penguatan program sosial berbasis kolaborasi lapangan.',
                'lead' => 'Program ini membuka ruang bagi komunitas dan relawan untuk tumbuh bersama, agar gerakan sosial tidak berhenti di satu aksi, tetapi berlanjut secara berkelanjutan.',
                'description' => [
                    ['body' => 'Dana digunakan untuk pelatihan relawan, kebutuhan koordinasi lapangan, materi edukasi komunitas, dan penguatan jejaring sosial berbasis wilayah.'],
                    ['body' => 'Dengan dukungan yang cukup, komunitas lokal dapat bergerak lebih mandiri dan membangun aksi sosial yang konsisten dari dalam wilayahnya sendiri.'],
                ],
                'quote' => 'Komunitas yang kuat membuat dampak sosial bertahan lebih lama daripada satu kegiatan saja.',
                'hero_image' => 'images/different-people-doing-volunteer-work.jpg',
                'target_amount' => 9000000,
                'start_date' => '2026-03-06',
                'end_date' => '2026-04-20',
                'categories' => ['Komunitas', 'Pemberdayaan'],
                'status' => 'Aktif',
                'focus' => [
                    'Pelatihan relawan',
                    'Penguatan komunitas lokal',
                    'Kolaborasi program sosial',
                ],
                'gallery' => [
                    [
                        'type' => 'image',
                        'src' => 'images/different-people-doing-volunteer-work.jpg',
                        'thumb' => 'images/different-people-doing-volunteer-work.jpg',
                    ],
                    [
                        'type' => 'image',
                        'src' => 'images/portrait-volunteer-who-organized-donations-charity.jpg',
                        'thumb' => 'images/portrait-volunteer-who-organized-donations-charity.jpg',
                    ],
                ],
                'is_featured' => false,
                'sort_order' => 6,
                'donations' => [
                    [
                        'donor_name' => 'Komunitas Bergerak',
                        'donor_whatsapp' => '081234567815',
                        'amount' => 1500000,
                        'donated_at' => '2026-03-08',
                        'payment_method' => 'Transfer',
                        'note' => 'Pelatihan relawan.',
                    ],
                    [
                        'donor_name' => 'Ruang Kolaborasi',
                        'donor_whatsapp' => '081234567816',
                        'amount' => 1200000,
                        'donated_at' => '2026-03-13',
                        'payment_method' => 'E-wallet',
                        'note' => 'Materi edukasi komunitas.',
                    ],
                    [
                        'donor_name' => 'Nusa Sosial',
                        'donor_whatsapp' => '081234567817',
                        'amount' => 1620000,
                        'donated_at' => '2026-03-17',
                        'payment_method' => 'Transfer',
                        'note' => 'Penguatan program lapangan.',
                    ],
                ],
            ],
        ];

        foreach ($programs as $program) {
            $donations = $program['donations'];
            unset($program['donations']);

            $record = DonationProgram::updateOrCreate(
                ['slug' => $program['slug']],
                $program,
            );

            foreach ($donations as $donation) {
                DonationDetail::updateOrCreate(
                    [
                        'donation_program_id' => $record->id,
                        'donor_name' => $donation['donor_name'],
                        'amount' => $donation['amount'],
                        'donated_at' => $donation['donated_at'],
                    ],
                    [
                        'donor_whatsapp' => $donation['donor_whatsapp'],
                        'payment_method' => $donation['payment_method'] === 'E-wallet' ? 'QRIS' : $donation['payment_method'],
                        'note' => $donation['note'],
                        'is_verified' => true,
                        'verified_at' => now(),
                        'verified_by' => 1,
                    ],
                );
            }
        }
    }
}
