<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'Dr. Budi Santoso',
                'alamat' => 'Semarang',
                'no_ktp' => '3374010101010001',
                'no_hp' => '081234567890',
                'no_rm' => null,
                'role' => 'dokter',
                'id_poli' => 1,
                'email' => 'budi@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'nama' => 'Dr. Siti Aminah',
                'alamat' => 'Semarang',
                'no_ktp' => '3374010101010002',
                'no_hp' => '081234567891',
                'no_rm' => null,
                'role' => 'dokter',
                'id_poli' => 2,
                'email' => 'siti@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'nama' => 'Andi Pratama',
                'alamat' => 'Semarang',
                'no_ktp' => '3374010101010003',
                'no_hp' => '081234567892',
                'no_rm' => 'RM001',
                'role' => 'pasien',
                'id_poli' => null,
                'email' => 'andi@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'nama' => 'Rina Wulandari',
                'alamat' => 'Semarang',
                'no_ktp' => '3374010101010004',
                'no_hp' => '081234567893',
                'no_rm' => 'RM002',
                'role' => 'pasien',
                'id_poli' => null,
                'email' => 'rina@gmail.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}