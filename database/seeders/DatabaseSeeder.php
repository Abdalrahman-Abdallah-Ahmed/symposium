<?php

namespace Database\Seeders;

use App\Models\Conference;
use App\Models\Talk;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()
        ->has(Talk::factory()->count(5))
        ->create([
            'name' => 'Abdoz',
            'email' => 'abdoz@example.com',
            'password' => bcrypt('123123123'),
        ]);

        Conference::factory()->count(5)->create();
    }
}
