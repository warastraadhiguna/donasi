<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('website_contents', function (Blueprint $table) {
            $table->string('hero_background_image')->nullable()->after('id');
            $table->string('about_image')->nullable()->after('feature_4_text');
        });
    }

    public function down(): void
    {
        Schema::table('website_contents', function (Blueprint $table) {
            $table->dropColumn([
                'hero_background_image',
                'about_image',
            ]);
        });
    }
};
