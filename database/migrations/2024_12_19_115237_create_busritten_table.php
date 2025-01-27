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
        Schema::create('busritten', function (Blueprint $table) {
            $table->id('busrit_id');
            $table->timestamps();
            $table->unsignedBigInteger('festival_id');
            $table->foreign('festival_id')->references('festival_id')->on('festivals');
            $table->unsignedBigInteger('bus_id');
            $table->foreign('bus_id')->references('bus_id')->on('bussen');
            $table->string('vertrekplaats_datum_tijd1', 255)->nullable();
            $table->string('vertrekplaats_datum_tijd2', 255)->nullable();
            $table->string('vertrekplaats_datum_tijd3', 255)->nullable();
            $table->integer('klant')->default(0);
            $table->boolean('vol')->default(false);
            $table->integer('status')->default(0); // 0 = niemand in de bus 1 = 1 tot en met 34 klant in de bus en 3= vol!
            $table->boolean('opvolging')->default(false);
            $table->boolean('voorbij')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('busritten');
    }
};
