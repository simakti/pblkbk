<?php

namespace App\Imports;

use App\Models\DosenKBK;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportDosenKBK implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        return new DosenKBK([
            'id_pengruskbk' => $collection[0],
            'id_jenis_kbk' => $collection[1],
            'id_dosen' => $collection[2],
        ]);
    }
}
