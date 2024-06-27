<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPengurusKBK implements FromCollection, WithHeadings
{
    public function collection()
    {
        
        return DB::table('penguruskbk')
            ->join('jenis_kbk', 'penguruskbk.id_jenis_kbk', '=', 'jenis_kbk.id_jenis_kbk')
            ->join('dosen', 'penguruskbk.id_dosen', '=', 'dosen.id_dosen')
            ->join('jabatankbk', 'penguruskbk.id_jabatan_kbk', '=', 'jabatankbk.id_jabatan_kbk')
            ->select(
                'penguruskbk.id_penguruskbk',
                'dosen.nama_dosen',
                'jenis_kbk.jenis_kbk',
                'jabatankbk.jabatan',
                'penguruskbk.status'
            )
            ->orderBy('penguruskbk.id_penguruskbk')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID Pengurus KBK',
            'Nama Dosen',
            'Jenis KBK',
            'Jabatan KBK',
            'Status'
        ];
    }
}
