<?php

namespace Database\Factories;

use App\Models\bussen;
use App\Models\chauffeurs;
use App\View\Components\chauffeur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\bussen>
 */
class bussenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = bussen::class;
    public function definition(): array
    {
        $chauffeur = Chauffeurs::factory()->create();

        return [
                'chauffeur_id' => $chauffeur->id,
                'beschikbaar' => false,
        ];
    }
}

// belangrijk!!!
// beschikbaar staat nu op false omdat deze wordt aangeroepen door de busritten factory!
// indien er ENKEL een bus en chauffeur aangemaakt moet worden die NOG NIET NAAR EEN FESTIVAL GAAT, verander false naar true!
// indien je festival data wilt printen dan maak je false, dan wordt er voor de festival ook direct een bus gekopppeld en gegenereerd.
