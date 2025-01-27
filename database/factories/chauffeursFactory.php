<?php

namespace Database\Factories;

use App\Models\chauffeurs;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\chauffeurs>
 */
class chauffeursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = chauffeurs::class;
    public function definition(): array
    {

        $user = User::factory()->create([
            'role_id' => 2,
        ]);

        return [
            'id' => $user->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
