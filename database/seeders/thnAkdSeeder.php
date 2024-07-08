<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class thnAkdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $thn_akdData = [
            [
                "smt_thn_akd" => "2022/2023-Genap",
                "status" => "0",
            ],
            [
                "smt_thn_akd" => "2023/2024-Ganjil",
                "status" => "0",
            ],
            [
                "smt_thn_akd" => "2023/2024-Genap",
                "status" => "1",
            ],
        ];

        foreach ($thn_akdData as $data) {
            DB::table('thnakd')->insert([
                'thn_akd' => $data['smt_thn_akd'],
                'status' => $data['status'],
            ]);
        }
    }
}
