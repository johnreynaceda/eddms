<?php

namespace Database\Seeders;

use App\Models\Program;
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
        // User::factory(10)->create();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'admin',
        ]);

        Program::create([
            'name' => 'BSIT',
        ]);
        Program::create([
            'name' => 'BSIS',
        ]);
        Program::create([
            'name' => 'BSCS',
        ]);

    }
}
