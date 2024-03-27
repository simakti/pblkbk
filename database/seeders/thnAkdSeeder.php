<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class thnAkdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $thn_akdData = [
            ['2022/2023-Genap', '0'],
            ['2023/2024-Ganjil', '0'],
            ['2023/2024-Genap', '1']
        ];

        foreach ($thn_akdData as $data) {
            DB::table('thnakd')->insert([
                'thn_akd' => $data[0],
                'status' => $data[1]
            ]);
        }
    }
}
