<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DataKbkController;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportDataKBK implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('jenis_kbk')
            ->select('jenis_kbk.*')
            ->orderBy('id_jenis_kbk')
            ->get();
        // return $data_datakbk;
    }
    public function headings(): array
    {
        return [
            'ID Jenis KBK',
            'Jenis KBK',
            'Keterangan'
        ];
    }
}
