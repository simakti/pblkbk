<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VerifRPSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $VerifRPSData = [
<<<<<<< HEAD
            [160, 2, 1, '', 'diverifikasi', '', '2023-12-25']
=======
            [1, 292, '', 1, '', '2023-12-25']
>>>>>>> 4fa1c039052e23a0ad5fed4c1d30d390abdf7be3

        ];

        foreach ($VerifRPSData as $data) {
            DB::table('verif_rps')->insert([
<<<<<<< HEAD
                'id_dosen' => $data[0],
                'id_matakuliah' => $data[1],
                'id_thnakd' => $data[2],
                'file' => $data[3],
                'status' => $data[4],
                'catatan' => $data[5],
                'tanggal_verif' => $data[6]
=======
                'id_repo_rps' => $data[0],
                'id_dosen' => $data[1],
                'file_verifikasi' => $data[2],
                'status_verif_rps' => $data[3],
                'catatan' => $data[4],
                'tanggal_diverifikasi' => $data[5]
>>>>>>> 4fa1c039052e23a0ad5fed4c1d30d390abdf7be3
            ]);
        }
    }
}
