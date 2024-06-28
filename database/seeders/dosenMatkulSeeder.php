<?php

namespace Database\Seeders;

use App\Models\DosenMatkul;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class dosenMatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataDosenMatkul = [

            [
                "nama_dosen" => "RITA AFYENNI, S.Kom, M.Kom",
                "nidn" => "0018077099",
                "kode_matakuliah" => "RPL3205",
                "nama_matakuliah" => "Pengantar Rekayasa Perangkat Lunak",
                "kode_kelas" => "TRPL1A",
                "nama_kelas" => "TRPL 1A",
                "thn_akd" => "2023/2024-Genap",
            ],
            [
                "nama_dosen" => "DWINY MEIDELFI, S.Kom, M.Cs",
                "nidn" => "0009058601",
                "kode_matakuliah" => "RPL3205",
                "nama_matakuliah" => "Pengantar Rekayasa Perangkat Lunak",
                "kode_kelas" => "TRPL1B",
                "nama_kelas" => "TRPL 1B",
                "thn_akd" => "2023/2024-Genap",
            ],

        ];
        foreach ($dataDosenMatkul as $key => $value) {
            $id_dosen = DB::table('dosen')->where('nama_dosen', $value['nama_dosen'])->select('id_dosen')->first()->id_dosen;
            $id_matakuliah = DB::table('matakuliah')->where('nama_matakuliah', $value['nama_matakuliah'])->select('id_matakuliah')->first()->id_matakuliah;
            $id_kelas = DB::table('kelas')->where('nama_kelas', $value['nama_kelas'])->select('id_kelas')->first()->id_kelas;
            $id_thnakd = DB::table('thnakd')->where('thn_akd', $value['thn_akd'])->select('id_thnakd')->first()->id_thnakd;

            $dosenMatkul = new DosenMatkul;
            $dosenMatkul->id_dosen = $id_dosen;
            $dosenMatkul->id_matakuliah = $id_matakuliah;
            $dosenMatkul->id_kelas = $id_kelas;
            $dosenMatkul->id_thnakd = $id_thnakd;
            $dosenMatkul->save();
        }
    }
}
