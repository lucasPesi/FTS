<?php

namespace Database\Seeders;

use App\Models\festivals;
use Database\Factories\FestivalsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FestivalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        public function run(): void
    {
        //   user::factory()->create();
           festivals::factory()->count(10)->create();

    }

}
