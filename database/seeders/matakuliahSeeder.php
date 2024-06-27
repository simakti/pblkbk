<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class matakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataMatkul = [
                [
                    "id_matakuliah" => "1",
                    "kode_matakuliah" => "RPL3205",
                    "nama_matakuliah" => "Pengantar Rekayasa Perangkat Lunak",
                    "TP" => "T",
                    "sks" => "2",
                    "jam" => "2",
                    "sks_teori" => "2",
                    "sks_praktek" => "0",
                    "jam_teori" => "2",
                    "jam_praktek" => "0",
                    "semester" => "2",
                    "id_kurikulum" => "5",

            ],
        ];
        DB::table('matakuliah')->insert($dataMatkul);
    }
}
