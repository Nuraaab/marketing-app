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
        Schema::create('pricing_descriptions', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            $table->string('status');
            $table->unsignedBigInteger('pricing_id'); 
            $table->foreign('pricing_id')
                ->references('id')
                ->on('pricings') 
                ->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_descriptions');
    }
};
