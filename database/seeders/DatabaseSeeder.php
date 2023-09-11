<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Level::create([
            'level' => 'petugas'
        ]);

        \App\Models\Level::create([
            'level' => 'administrator'
        ]);

        \App\Models\Petugas::create([
            'nama_petugas' => 'Petugas',
            'username' => 'petugas',
            'password' => Hash::make('test123'),
            'level_id' => 1
        ]);

        \App\Models\Petugas::create([
            'nama_petugas' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('test123'),
            'level_id' => 2
        ]);
    }
}
