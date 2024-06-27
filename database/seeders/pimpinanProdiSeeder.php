<?php

namespace Database\Seeders;

use App\Models\Pimpinanprodi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class pimpinanProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dataPimpinanProdi = [
            [
                "kode_jabatan_pimpinan" => "KAPRODI",
                "nama_dosen" => "MERI AZMI, S.T, M.Cs",
                "nidn" => "0029068102",
                "nip" => "198106292006042001",
                "kode_prodi" => "4TRPL",
                "prodi" => "Teknologi Rekayasa Perangkat Lunak",
                "periode" => "2022-2026",
                "status" => "1",
            ],
        ];
        foreach ($dataPimpinanProdi as $key => $value) {
            $id_jabatan_pimpinan = DB::table('jabatan_pimpinan')->where('kode_jabatan_pimpinan', $value['kode_jabatan_pimpinan'])->select('id_jabatan_pimpinan')->first()->id_jabatan_pimpinan;
            $id_dosen = DB::table('dosen')->where('nama_dosen', $value['nama_dosen'])->select('id_dosen')->first()->id_dosen;
            $id_prodi = DB::table('prodi')->where('kode_prodi', $value['kode_prodi'])->select('id_prodi')->first()->id_prodi;

            $pimpinanProdi = new Pimpinanprodi;
            $pimpinanProdi->id_jabatan_pimpinan = $id_jabatan_pimpinan;
            $pimpinanProdi->id_dosen = $id_dosen;
            $pimpinanProdi->id_prodi = $id_prodi;
            $pimpinanProdi->periode = $value['periode'];
            $pimpinanProdi->status = $value['status'];
            $pimpinanProdi->save();
        }
    }
}
