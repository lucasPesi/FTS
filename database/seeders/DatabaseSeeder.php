<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(busrittenSeeder::class);
  //   $this->call(bussenSeeder::class);

//       $this->call(chauffeursSeeder::class);
//        $this->call(klantSeeder::class);
//
//
//        $this->call(plannersSeeder::class);
//
//
//        $this->call(RollenSeeder::class);
//
//
//        $this->call(FestivalSeeder::class);

 //       User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

    }
}
