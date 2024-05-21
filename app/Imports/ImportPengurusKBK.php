<?php

namespace App\Imports;

use App\Models\PengurusKBK;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportPengurusKBK implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        return new PengurusKBK([
            'id_pengruskbk' => $collection[0],
            'id_jenis_kbk' => $collection[1],
            'id_dosen' => $collection[2],
            'id_jabatan_kbk' => $collection[3],
            'status' => $collection[4],
        ]);
    }
}
