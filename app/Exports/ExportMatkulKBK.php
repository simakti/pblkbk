<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class ExportMatkulKBK implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data_matkul_kbk = DB::table('matkul_kbk')
            ->join('matakuliah', 'matkul_kbk.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->join('jenis_kbk', 'matkul_kbk.id_jenis_kbk', '=', 'jenis_kbk.id_jenis_kbk')
            ->join('kurikulum', 'matkul_kbk.id_kurikulum', '=', 'kurikulum.id_kurikulum')
            ->select('matkul_kbk.*', 'matakuliah.nama_matakuliah', 'jenis_kbk.jenis_kbk', 'kurikulum.nama_kurikulum')
            ->orderBy('id_matkul_kbk')
            ->get();

        return $data_matkul_kbk;
    }
}
