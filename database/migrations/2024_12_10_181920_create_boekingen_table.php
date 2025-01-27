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
        Schema::create('boekingen', function (Blueprint $table) {
            $table->id('boeking_id');
            $table->unsignedBigInteger('festival_id');
            $table->foreign('festival_id')->references('festival_id')->on('festivals');
            $table->unsignedBigInteger('klant_id');
            $table->foreign('klant_id')->references('klant_id')->on('klant');
            $table->unsignedBigInteger('busrit_id');
            $table->foreign('busrit_id')->references('busrit_id')->on('busritten');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boekingen');
    }
};
