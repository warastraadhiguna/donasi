<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('donation_programs', function (Blueprint $table) {
            $table->unsignedBigInteger('target_amount')->default(0)->after('hero_image');
            $table->date('start_date')->nullable()->after('target_amount');
            $table->date('end_date')->nullable()->after('start_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donation_programs', function (Blueprint $table) {
            $table->dropColumn(['target_amount', 'start_date', 'end_date']);
        });
    }
};
