<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportPengurusKBK implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data_penguruskbk = DB::table('penguruskbk')
        ->join('jenis_kbk', 'penguruskbk.id_jenis_kbk', '=', 'jenis_kbk.id_jenis_kbk')
        ->join('dosen', 'penguruskbk.id_dosen', '=', 'dosen.id_dosen')
        ->join('jabatankbk', 'penguruskbk.id_jabatan_kbk', '=', 'jabatankbk.id_jabatan_kbk')
        ->select('penguruskbk.*', 'dosen.nama_dosen', 'jenis_kbk.jenis_kbk', 'jabatankbk.jabatan')
        ->orderBy('id_penguruskbk')
        ->get();
    return $data_penguruskbk;
    }
}
