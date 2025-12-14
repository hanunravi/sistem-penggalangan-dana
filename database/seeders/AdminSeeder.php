<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan data admin ke tabel users
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',      // Email untuk Login
            'password' => Hash::make('password123'), // Password untuk Login
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}