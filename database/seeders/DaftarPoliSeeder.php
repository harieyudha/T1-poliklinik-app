<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaftarPoliSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('poli')->insert([
            [
                'nama_poli' => 'Poli Umum',
                'keterangan' => 'Melayani pemeriksaan kesehatan umum',
            ],
            [
                'nama_poli' => 'Poli Gigi',
                'keterangan' => 'Melayani pemeriksaan dan perawatan gigi',
            ],
            [
                'nama_poli' => 'Poli Anak',
                'keterangan' => 'Melayani pemeriksaan kesehatan anak',
            ],
        ]);
    }
}