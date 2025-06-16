<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kurikulumSeeder extends Seeder
{
    public function run(): void
    {
        $dataKurikulum = [
            [
               // "id_kurikulum" => "1",
                "kode_kurikulum" => "KUR TRPL 2017",
                "nama_kurikulum" => "Kurikulum TRPL 2017",
                "tahun" => "2017",
                "id_prodi" => "1",
                "status" => "0",
            ],
            [
                //"id_kurikulum" => "2",
                "kode_kurikulum" => "KUR TRPL  2017 REV",
                "nama_kurikulum" => "Kurikulum TRPL 2017 Revisi",
                "tahun" => "2020",
                "id_prodi" => "2",
                "status" => "0",
            ],
            [
                //"id_kurikulum" => "3",
                "kode_kurikulum" => "KUR TRPL 2022",
                "nama_kurikulum" => "Kurikulum TRPL 2022",
                "tahun" => "2022",
                "id_prodi" => "2",
                "status" => "1",
            ],
            [
               // "id_kurikulum" => "4",
                "kode_kurikulum" => "KUR TRPL 2022 V.1",
                "nama_kurikulum" => "Kurikulum TRPL 2022 Versi 1",
                "tahun" => "2023",
                "id_prodi" => "3",
                "status" => "1",
            ],
            [
               // "id_kurikulum" => "5",
                "kode_kurikulum" => "KUR TRPL  2022 V.2",
                "nama_kurikulum" => "Kurikulum TRPL 2022 Versi 2",
                "tahun" => "2024",
                "id_prodi" => "4",
                "status" => "1",
            ],
        ];
        DB::table('kurikulum')->insert($dataKurikulum);
    }
}
