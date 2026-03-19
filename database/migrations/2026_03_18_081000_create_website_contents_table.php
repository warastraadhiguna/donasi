<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('website_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_eyebrow')->nullable();
            $table->text('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_note_1')->nullable();
            $table->string('hero_note_2')->nullable();
            $table->string('hero_note_3')->nullable();
            $table->string('hero_focus_title')->nullable();
            $table->string('hero_focus_1_label')->nullable();
            $table->string('hero_focus_1_value')->nullable();
            $table->string('hero_focus_2_label')->nullable();
            $table->string('hero_focus_2_value')->nullable();
            $table->string('hero_focus_3_label')->nullable();
            $table->string('hero_focus_3_value')->nullable();
            $table->string('hero_focus_4_label')->nullable();
            $table->string('hero_focus_4_value')->nullable();
            $table->string('movement_title')->nullable();
            $table->string('feature_1_text')->nullable();
            $table->string('feature_2_text')->nullable();
            $table->string('feature_3_text')->nullable();
            $table->string('feature_4_text')->nullable();
            $table->string('about_badge')->nullable();
            $table->text('about_title')->nullable();
            $table->text('about_description')->nullable();
            $table->string('about_principle_title')->nullable();
            $table->text('about_principle_1')->nullable();
            $table->text('about_principle_2')->nullable();
            $table->string('about_metric_1_value')->nullable();
            $table->string('about_metric_2_value')->nullable();
            $table->text('about_metric_1_text')->nullable();
            $table->text('about_metric_2_text')->nullable();
            $table->string('impact_1_value')->nullable();
            $table->text('impact_1_text')->nullable();
            $table->string('impact_2_value')->nullable();
            $table->text('impact_2_text')->nullable();
            $table->string('impact_3_value')->nullable();
            $table->text('impact_3_text')->nullable();
            $table->text('volunteer_title')->nullable();
            $table->string('volunteer_form_title')->nullable();
            $table->string('volunteer_reason_badge')->nullable();
            $table->text('volunteer_reason_title')->nullable();
            $table->text('volunteer_reason_description')->nullable();
            $table->string('contact_form_title')->nullable();
            $table->text('contact_form_description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('website_contents');
    }
};
