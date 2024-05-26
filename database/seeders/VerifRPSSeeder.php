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
            [160, 2, 1, '', 'diverifikasi', '', '2023-12-25']

        ];

        foreach ($VerifRPSData as $data) {
            DB::table('verif_rps')->insert([
                'id_dosen' => $data[0],
                'id_matakuliah' => $data[1],
                'id_thnakd' => $data[2],
                'file' => $data[3],
                'status' => $data[4],
                'catatan' => $data[5],
                'tanggal_verif' => $data[6]
            ]);
        }
    }
}
