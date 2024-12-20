<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'nama'      =>  'Administrator',
            'username'  =>  'administrator',
            'email'     =>  'admin@example.com',
            'role'      =>  'admin'
        ]);
    }
}
