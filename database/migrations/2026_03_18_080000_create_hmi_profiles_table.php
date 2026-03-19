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
        Schema::create('hmi_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('organization_name')->default('HMI Peduli');
            $table->string('header_tagline')->default('Gerakan charity untuk pendidikan, pangan, dan kesehatan');
            $table->string('contact_email')->default('halo@hmipeduli.org');
            $table->string('instagram_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('whatsapp_url')->nullable();
            $table->text('footer_description')->nullable();
            $table->string('contact_team_name')->default('Tim HMI Peduli');
            $table->string('contact_team_role')->default('Kolaborasi, bantuan, dan donasi');
            $table->text('contact_address')->nullable();
            $table->text('contact_support_text')->nullable();
            $table->string('transfer_bank_name')->default('Bank BCA');
            $table->string('transfer_account_number')->default('1234567890');
            $table->string('transfer_account_holder')->default('HMI Peduli Indonesia');
            $table->string('qris_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hmi_profiles');
    }
};
