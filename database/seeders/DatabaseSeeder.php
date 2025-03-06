<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pelanggan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin'
        ]);
        Pelanggan::create([
            'namaPelanggan' => 'awal',
            'alamat' => 'Cibatur',
            'noTelp' => '087816962296'
        ]);
    } 
}
