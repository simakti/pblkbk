<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportDosenKBK implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data_dosenkbk = DB::table('dosenkbk')
        ->join('jenis_kbk', 'dosenkbk.id_jenis_kbk', '=', 'jenis_kbk.id_jenis_kbk')
        ->join('dosen', 'dosenkbk.id_dosen', '=', 'dosen.id_dosen')
        ->select('dosenkbk.*', 'dosen.nama_dosen', 'jenis_kbk.jenis_kbk')
        ->orderBy('id_dosen_kbk')
        ->get();
    return $data_dosenkbk;
    }
}
