<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('website_contents', function (Blueprint $table) {
            $table->json('movement_items')->nullable()->after('movement_title');
        });

        DB::table('website_contents')->orderBy('id')->get()->each(function (object $record): void {
            DB::table('website_contents')
                ->where('id', $record->id)
                ->update([
                    'movement_items' => json_encode([
                        [
                            'text' => $record->feature_1_text ?: 'Gabung jadi relawan',
                            'icon' => 'images/icons/hands.png',
                            'link' => '/donasi',
                        ],
                        [
                            'text' => $record->feature_2_text ?: 'Dukung program sosial',
                            'icon' => 'images/icons/heart.png',
                            'link' => '#program',
                        ],
                        [
                            'text' => $record->feature_3_text ?: 'Salurkan donasi',
                            'icon' => 'images/icons/receive.png',
                            'link' => '/donasi',
                        ],
                        [
                            'text' => $record->feature_4_text ?: 'Buka kolaborasi',
                            'icon' => 'images/icons/scholarship.png',
                            'link' => '#kontak',
                        ],
                    ], JSON_UNESCAPED_UNICODE),
                ]);
        });
    }

    public function down(): void
    {
        Schema::table('website_contents', function (Blueprint $table) {
            $table->dropColumn('movement_items');
        });
    }
};
