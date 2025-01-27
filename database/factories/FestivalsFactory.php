<?php

namespace Database\Factories;

use App\Models\festivals;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<festivals>
 */
class FestivalsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = festivals::class;

//    public static function factory()
//    {
//    }

    public function definition(): array
    {

        return [
            'festival_naam' => $this->faker->colorName(),
            'festival_datum' => $this->faker->dateTimeBetween('now', '+1 year'),
            'festival_locatie' => $this->faker->city()
        ];
    }
}
