<?php

namespace Database\Factories;

use App\Models\klant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\klant>
 */
class klantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = klant::class;
    public function definition(): array
    {
            $user = User::factory()->create([
                'role_id' => 3,
            ]);

        return [
            'id' => $user->id,
            'aantal_punten' => $this->faker->numberBetween(1,249),
            'created_at' => now(),
            'updated_at' => now()
        ];

    }
}
