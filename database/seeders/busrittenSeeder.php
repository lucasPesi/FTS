<?php

namespace Database\Seeders;

use App\Models\busritten;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class busrittenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        busritten::factory(10)->create();
    }
}
