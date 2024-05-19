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
            [160, '', 'diverifikasi', '', '2023-12-25']

        ];

        foreach ($VerifRPSData as $data) {
            DB::table('verif_rps')->insert([
                'id_dosen' => $data[0],
                'file' => $data[1],
                'status' => $data[2],
                'catatan' => $data[3],
                'tanggal_verif' => $data[4]
            ]);
        }
    }
}
