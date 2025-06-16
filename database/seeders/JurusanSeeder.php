<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJurusan = [
            [
                "id_jurusan" => "1",
                "kode_jurusan" => "AN",
                "jurusan" => "Administrasi Niaga",
            ],
            ["id_jurusan" => "2", "kode_jurusan" => "AK", "jurusan" => "Akuntansi"],
            [
                "id_jurusan" => "3",
                "kode_jurusan" => "BI",
                "jurusan" => "Bahasa Inggris",
            ],
            [
                "id_jurusan" => "4",
                "kode_jurusan" => "EE",
                "jurusan" => "Teknik Elektro",
            ],
            ["id_jurusan" => "5", "kode_jurusan" => "ME", "jurusan" => "Teknik Mesin"],
            ["id_jurusan" => "6", "kode_jurusan" => "SP", "jurusan" => "Teknik Sipil"],
            [
                "id_jurusan" => "7",
                "kode_jurusan" => "TI",
                "jurusan" => "Teknologi Informasi",
            ],
        ];

        DB::table('jurusan')->insert($dataJurusan);
    }
}
