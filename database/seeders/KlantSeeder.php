<?php

namespace Database\Seeders;

use App\Models\klant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KlantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Klant::factory()->count(10)->create();
    }
}
