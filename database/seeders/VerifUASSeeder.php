<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VerifUASSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $VerifUASData = [
            [160, '', 'diverifikasi', '', '2023-12-25']

        ];

        foreach ($VerifUASData as $data) {
            DB::table('verif_uas')->insert([
                'id_dosen' => $data[0],
                'file' => $data[1],
                'status' => $data[2],
                'catatan' => $data[3],
                'tanggal_verif' => $data[4]
            ]);
        }
    }
}
