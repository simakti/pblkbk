<?php

namespace Database\Seeders;

use App\Models\Pimpinanjurusan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class pimpinanJurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPimpinanJurusan = [

            [
                "jabatan_pimpinan" => "Ketua Jurusan",
                "kode_jabatan_pimpinan" => "KAJUR",
                "kode_jurusan" => "TI",
                "jurusan" => "Teknologi Informasi",
                "nama_dosen" => "RONAL HADI, S.T, M.Kom",
                "nidn" => "0029017603",
                "periode" => "2022-2026",
                "status" => "1",
            ],
            [
                "jabatan_pimpinan" => "Sekretaris Jurusan",
                "kode_jabatan_pimpinan" => "SEKJUR",
                "kode_jurusan" => "TI",
                "jurusan" => "Teknologi Informasi",
                "nama_dosen" => "HUMAIRA, S.T, M.T",
                "nidn" => "0019038103",
                "periode" => "2022-2026",
                "status" => "1",
            ],
        ];
        foreach ($dataPimpinanJurusan as $key => $value) {
            $id_jabatan_pimpinan = DB::table('jabatan_pimpinan')->where('kode_jabatan_pimpinan', $value['kode_jabatan_pimpinan'])->select('id_jabatan_pimpinan')->first()->id_jabatan_pimpinan;
            $id_jurusan = DB::table('jurusan')->where('kode_jurusan', $value['kode_jurusan'])->select('id_jurusan')->first()->id_jurusan;
            $id_dosen = DB::table('dosen')->where('nama_dosen', $value['nama_dosen'])->select('id_dosen')->first()->id_dosen;
            $pimpinanJurusan = new Pimpinanjurusan;
            $pimpinanJurusan->id_jabatan_pimpinan = $id_jabatan_pimpinan;
            $pimpinanJurusan->id_jurusan = $id_jurusan;
            $pimpinanJurusan->id_dosen = $id_dosen;
            $pimpinanJurusan->periode = $value['periode'];
            $pimpinanJurusan->status = $value['status'];
            $pimpinanJurusan->save();
        }
    }
}
