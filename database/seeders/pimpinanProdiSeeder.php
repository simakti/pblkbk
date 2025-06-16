<?php

namespace Database\Seeders;

use App\Models\Pimpinanprodi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PimpinanProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPimpinanProdi = [
            [
                'kode_jabatan_pimpinan' => 'KAPRODI',
                'nama_dosen' => 'MERI AZMI, S.T, M.Cs',
                'nidn' => '0029068102',
                'nip' => '198106292006042001',
                'kode_prodi' => '4TRPL',
                'prodi' => 'Teknologi Rekayasa Perangkat Lunak',
                'periode' => '2022-2026',
                'status' => '1',
            ],
        ];

        foreach ($dataPimpinanProdi as $value) {
            $jabatan = DB::table('jabatan_pimpinan')->where('kode_jabatan_pimpinan', $value['kode_jabatan_pimpinan'])->select('id_jabatan_pimpinan')->first();
            if (!$jabatan) {
                throw new \Exception("Jabatan dengan kode '{$value['kode_jabatan_pimpinan']}' tidak ditemukan di tabel jabatan_pimpinan.");
            }

            $dosen = DB::table('dosen')->where('nama_dosen', $value['nama_dosen'])->select('id_dosen')->first();
            if (!$dosen) {
                throw new \Exception("Dosen dengan nama '{$value['nama_dosen']}' tidak ditemukan di tabel dosen.");
            }

            // Ambil id_prodi
            $prodi = DB::table('prodi')->where('kode_prodi', $value['kode_prodi'])->select('id_prodi')->first();
            if (!$prodi) {
                throw new \Exception("Prodi dengan kode '{$value['kode_prodi']}' tidak ditemukan di tabel prodi.");
            }

            // Simpan data ke tabel pimpinan_prodi
            $pimpinanProdi = new Pimpinanprodi;
            $pimpinanProdi->id_jabatan_pimpinan = $jabatan->id_jabatan_pimpinan;
            $pimpinanProdi->id_dosen = $dosen->id_dosen;
            $pimpinanProdi->id_prodi = $prodi->id_prodi;
            $pimpinanProdi->periode = $value['periode'];
            $pimpinanProdi->status = $value['status'];
            $pimpinanProdi->save();
        }
    }
}
