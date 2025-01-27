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
        Schema::create('bussen', function (Blueprint $table) {
            $table->id('bus_id');
            $table->unsignedBigInteger('chauffeur_id');
            $table->foreign('chauffeur_id')->references('chauffeur_id')->on('chauffeurs')->onDelete('cascade');
            $table->boolean('beschikbaar')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bussen');
    }
};
