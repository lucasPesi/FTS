<?php

namespace Database\Seeders;

use App\Models\rollen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class rollenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rollen::create(['naam' => 'planning']);
        Rollen::create(['naam' => 'buschauffeur']);
        Rollen::create(['naam' => 'klant']);

    }
}
