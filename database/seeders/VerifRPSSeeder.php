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
            [1, 1, '', '2023-12-25']
        ];

        foreach ($VerifRPSData as $data) {
            DB::table('verif_rps')->insert([
                'id_repo_rps' => $data[0],
                'status_verif_rps' => $data[1],
                'catatan' => $data[2],
                'tanggal_diverifikasi' => $data[3],
            ]);
        }
    }
}
