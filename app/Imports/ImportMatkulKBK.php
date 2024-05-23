<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ImportMatkulKBK implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        return new ImportMatkulKBK([
            'id_matkul_kbk' => $collection[0],
            'id_matakuliah' => $collection[1],
            'id_jenis_kbk' => $collection[2],
            'id_kurikulum' => $collection[3],

        ]);
        
    }
}
