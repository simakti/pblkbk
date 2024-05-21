<?php

namespace App\Imports;

use App\Models\JenisKBK;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportDataKBK implements ToModel
{
    public function model(array $row)
    {
        return new JenisKBK([
            'id_jenis_kbk' => $row[0],
            'jenis_kbk' => $row[1],
            'deskripsi' => $row[2],
        ]);
    }
}



