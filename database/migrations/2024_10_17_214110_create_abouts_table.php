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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle')->nullable();
            $table->string('normal_text')->nullable();
            $table->string('highlighted_text')->nullable();
            $table->string('about_image')->nullable();
            $table->string('quote_image')->nullable();
            $table->longText('content')->nullable();
            $table->string('about_button_name')->nullable();
            $table->string('about_button_url')->nullable();
            $table->string('project_completed')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
