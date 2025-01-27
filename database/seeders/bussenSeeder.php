<?php

namespace Database\Seeders;

use App\Models\bussen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class bussenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        bussen::factory(10)->create();
    }
}
