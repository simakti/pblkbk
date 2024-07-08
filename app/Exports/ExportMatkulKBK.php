<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportMatkulKBK implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DB::table('matkul_kbk')
            ->join('matakuliah', 'matkul_kbk.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->join('jenis_kbk', 'matkul_kbk.id_jenis_kbk', '=', 'jenis_kbk.id_jenis_kbk')
            ->join('kurikulum', 'matkul_kbk.id_kurikulum', '=', 'kurikulum.id_kurikulum')
            ->select(
                'matkul_kbk.id_matkul_kbk',
                'matakuliah.nama_matakuliah',
                'jenis_kbk.jenis_kbk',
                'kurikulum.nama_kurikulum'
            )
            ->orderBy('matkul_kbk.id_matkul_kbk')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID Matkul KBK',
            'Nama Mata Kuliah',
            'Jenis KBK',
            'Nama Kurikulum',
            'Status'
        ];
    }
}
