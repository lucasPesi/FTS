<?php

namespace Database\Factories;

use App\Models\planners;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<planners>
 */
class plannersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
/*
 * het plan van aanpak, als de factory van de planners wordt aangeroepen meot er eerst een user aangemaakt worden,
 * als dit gebeurd is moet de net nieuw aangemaakte user een planner worden.
 * door de foreign key te gebruiken kunnen we de relatie tussen beide defineren.
 */

    protected $model = planners::class;

    public function definition(): array
    {
        $user = user::factory()->create([
            'role_id' => 1,
        ]);

        return [
            'id' => $user->id,
            'created_at' => now(),
            'updated_at' => now()
        ];

    }
}
