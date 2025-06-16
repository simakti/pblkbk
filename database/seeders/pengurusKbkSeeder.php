<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengurusKbkSeeder extends Seeder
{
    public function run(): void
    {
        $pengurusKbk = [
            ['id_jenis_kbk' => 3, 'id_dosen' => 1, 'id_jabatan_kbk' => 1, 'status' => 1], // ALDE ALANDA S.Kom M.T (Ketua)
            ['id_jenis_kbk' => 3, 'id_dosen' => 2, 'id_jabatan_kbk' => 2, 'status' => 1], // ALDO ERIANDA M.T S.ST (Sekretaris)
            ['id_jenis_kbk' => 3, 'id_dosen' => 3, 'id_jabatan_kbk' => 3, 'status' => 1], // CIPTO PRABOWO S.T M.T (Anggota)
            ['id_jenis_kbk' => 3, 'id_dosen' => 4, 'id_jabatan_kbk' => 3, 'status' => 1], // DEDDY PRAYAMA S.Kom M.ISD (Anggota)
            ['id_jenis_kbk' => 3, 'id_dosen' => 5, 'id_jabatan_kbk' => 3, 'status' => 1], // DEFNI S.Si M.Kom (Anggota)
            ['id_jenis_kbk' => 3, 'id_dosen' => 6, 'id_jabatan_kbk' => 3, 'status' => 1], // DENI SATRIA S.Kom M.Kom (Anggota)
            ['id_jenis_kbk' => 3, 'id_dosen' => 7, 'id_jabatan_kbk' => 3, 'status' => 1], // DWINY MEIDELFI S.Kom M.Cs (Anggota)
            ['id_jenis_kbk' => 3, 'id_dosen' => 8, 'id_jabatan_kbk' => 3, 'status' => 1], // ERVAN ASRI S.Kom M.Kom (Anggota)
            ['id_jenis_kbk' => 3, 'id_dosen' => 9, 'id_jabatan_kbk' => 3, 'status' => 1], // FAZROL ROZI M.Sc. (Anggota)
            ['id_jenis_kbk' => 3, 'id_dosen' => 10, 'id_jabatan_kbk' => 3, 'status' => 1], // FITRI NOVA M.T S.ST (Anggota)
            ['id_jenis_kbk' => 3, 'id_dosen' => 11, 'id_jabatan_kbk' => 3, 'status' => 1], // MERI AZMI, S.T, M.Cs (Anggota)
            ['id_jenis_kbk' => 3, 'id_dosen' => 12, 'id_jabatan_kbk' => 3, 'status' => 1], // RONAL HADI, S.T, M.Kom (Anggota)
            ['id_jenis_kbk' => 3, 'id_dosen' => 13, 'id_jabatan_kbk' => 3, 'status' => 1], // HUMAIRA, S.T, M.T (Anggota)
        ];

        DB::table('penguruskbk')->insert($pengurusKbk);
    }
}
