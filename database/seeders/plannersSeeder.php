<?php

namespace Database\Seeders;

use App\Models\planners;
use Database\Factories\plannersFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class plannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        planners::factory()->count(10)->create();
    }
}
