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
        Schema::create('donation_programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary');
            $table->text('lead')->nullable();
            $table->json('description')->nullable();
            $table->text('quote')->nullable();
            $table->string('hero_image');
            $table->json('categories')->nullable();
            $table->unsignedTinyInteger('progress_percentage')->default(0);
            $table->string('status')->default('Aktif');
            $table->json('focus')->nullable();
            $table->json('gallery')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_programs');
    }
};
