<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class jurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusanData = [
            ['AN', 'Administrasi Niaga'],
            ['AK', 'Akuntansi'],
            ['BI', 'Bahasa Inggris'],
            ['EE', 'Teknik Elektro'],
            ['ME', 'Teknik Mesin'],
            ['SP', 'Teknik Sipil'],
            ['TI', 'Teknologi Informasi']
        ];

        foreach ($jurusanData as $data) {
            DB::table('jurusan')->insert([
                'kode_jurusan' => $data[0],
                'jurusan' => $data[1]

            ]);
        }
    }
}
