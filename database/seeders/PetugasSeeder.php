<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Petugas::create([
            'nama_petugas' => 'hanan',
            'username' => 'hanan@gmail.com',
            'password' => Hash::make('password'),
            'telp' => '123456789',
            'level' => 'admin',
        ]);
    }
}    