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
        Schema::table('site_data', function (Blueprint $table) {
            $table->string('cta_title')->nullable()->after('team_subtitle');
            $table->string('cta_subtitle')->nullable()->after('cta_title');
            $table->string('cta_image')->nullable()->after('cta_subtitle');
            $table->string('facebook_url')->nullable()->after('cta_image');
            $table->string('youtube_url')->nullable()->after('facebook_url');
            $table->string('twitter_url')->nullable()->after('youtube_url');
            $table->string('linkden_url')->nullable()->after('twitter_url');
            $table->string('footer_logo')->nullable()->after('twitter_url');
            $table->longText('footer_desc')->nullable()->after('footer_logo');
            $table->string('newsletter_title')->nullable()->after('footer_desc');
            $table->string('newsletter_subtitle')->nullable()->after('newsletter_title');
            $table->string('copyright_text')->nullable()->after('newsletter_subtitle');
            $table->string('primary_color')->nullable()->after('copyright_text');
            $table->string('secondary_color')->nullable()->after('primary_color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_data', function (Blueprint $table) {
            //
        });
    }
};
