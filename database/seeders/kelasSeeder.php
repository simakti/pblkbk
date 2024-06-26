<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class kelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataKelas = [
            [
                "kode_kelas" => "TRPL1A",
                "nama_kelas" => "TRPL 1A",
                "kode_prodi" => "4TRPL",
                "prodi" => "Teknologi Rekayasa Perangkat Lunak",
                "thn_akd" => "2022/2023-Genap",
            ],
            [
                "kode_kelas" => "TRPL1B",
                "nama_kelas" => "TRPL 1B",
                "kode_prodi" => "4TRPL",
                "prodi" => "Teknologi Rekayasa Perangkat Lunak",
                "thn_akd" => "2023/2024-Genap",

            ],
        ];
        foreach ($dataKelas as $key => $value) {
            $id_prodi = DB::table('prodi')->where('kode_prodi', $value['kode_prodi'])->select('id_prodi')->first()->id_prodi;
            $id_thnakd = DB::table('thnakd')->where('thn_akd', $value['thn_akd'])->select('id_thnakd')->first()->id_thnakd;
            $kelas = new Kelas;
            $kelas->kode_kelas = $value['kode_kelas'];
            $kelas->nama_kelas = $value['nama_kelas'];
            $kelas->id_prodi = $id_prodi;
            $kelas->id_thnakd = $id_thnakd;
            $kelas->save();
        }
    }
}
