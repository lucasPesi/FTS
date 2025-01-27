<?php

namespace Database\Seeders;

use App\Models\chauffeurs;
use App\View\Components\chauffeur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class chauffeursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $table = 'chauffeurs';
    public function run(): void
    {
        chauffeurs::factory(10)->create();
    }
}
