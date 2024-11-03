<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('site_data', function (Blueprint $table) {
            $table->string('faq_video_url')->nullable(); 
        });
    }
    
    public function down()
    {
        Schema::table('site_data', function (Blueprint $table) {
            $table->dropColumn('faq_video_url'); 
        });
    }
};
