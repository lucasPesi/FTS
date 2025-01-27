<?php

namespace Database\Factories;

use App\Models\busritten;
use App\Models\bussen;
use App\Models\festivals;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\busritten>
 */
class busrittenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = busritten::class;
    public function definition(): array
    {
        $newFestival =  festivals::factory()->create();
        $newBusEnChauffeur = bussen::factory()->create(); // als er een nieuwe bus wordt aangemaakt dan wordt er ook een nieuwe chaffeur gemaakt. dit is gedefineerd in de bussen factory.



        return [
            'festival_id' => $newFestival->festival_id,
            'bus_id' => $newBusEnChauffeur->bus_id,
            'vertrekplaats_datum_tijd1' => null,
            'vertrekplaats_datum_tijd2' => null,
            'vertrekplaats_datum_tijd3' => null,
            'klant' => 0,
            'status' => 0,
            'opvolging' => false,
            'voorbij' => false,
        ];
    }
}
