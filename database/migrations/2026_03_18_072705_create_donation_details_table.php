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
        Schema::create('donation_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donation_program_id')->constrained()->cascadeOnDelete();
            $table->string('donor_name');
            $table->string('donor_whatsapp')->nullable();
            $table->unsignedBigInteger('amount');
            $table->date('donated_at');
            $table->string('payment_method')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_details');
    }
};
