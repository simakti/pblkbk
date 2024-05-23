<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DataKbkController;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDataKBK implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data_datakbk = DB::table('jenis_kbk')
            ->select('jenis_kbk.*')
            ->orderBy('id_jenis_kbk')
            ->get();
        return $data_datakbk;
    }
}
