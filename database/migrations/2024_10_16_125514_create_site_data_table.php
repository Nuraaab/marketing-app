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
        Schema::create('site_data', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo')->nullable();
            $table->string('banner_title')->nullable();
            $table->string('banner_sub_title')->nullable();
            $table->string('banner_button_name')->nullable();
            $table->string('banner_button_url')->nullable();
            $table->string('banner_video_button')->nullable();
            $table->string('banner_video_url')->nullable();
            $table->string('feature_title')->nullable();
            $table->string('brand_title')->nullable();
            $table->string('about_title')->nullable();
            $table->string('service_title')->nullable();
            $table->longText('service_subtitle')->nullable();
            $table->string('why_choose_us_title')->nullable();
            $table->string('why_choose_us_subtitle')->nullable();
            $table->string('why_choose_us_description')->nullable();
            $table->string('why_choose_us_image')->nullable();
            $table->string('project_title')->nullable();
            $table->longText('project_subtitle')->nullable();
            $table->string('faq_title')->nullable();
            $table->longText('faq_subtitle')->nullable();
            $table->longText('faq_image')->nullable();
            $table->string('testimonial_title')->nullable();
            $table->longText('testimonial_subtitle')->nullable();
            $table->longText('testimonial_image')->nullable();
            $table->string('blog_title')->nullable();
            $table->longText('blog_subtitle')->nullable();
            $table->string('package_title')->nullable();
            $table->longText('package_subtitle')->nullable();
            $table->string('team_title')->nullable();
            $table->longText('team_subtitle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_data');
    }
};
