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
        Schema::create('team_socials', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('image');
            $table->unsignedBigInteger('team_id'); 
            $table->foreign('team_id')
                ->references('id')
                ->on('teams') 
                ->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_socials');
    }
};
