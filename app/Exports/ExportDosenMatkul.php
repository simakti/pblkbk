<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportDosenMatkul implements FromCollection, WithHeadings
{
    public function collection()
    {

        return DB::table('dosen_matakuliah')
            ->join('dosen', 'dosen_matakuliah.id_dosen', '=', 'dosen.id_dosen')
            ->join('matakuliah', 'dosen_matakuliah.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->join('kelas', 'dosen_matakuliah.id_kelas', '=', 'kelas.id_kelas')
            ->join('thnakd', 'dosen_matakuliah.id_thnakd', '=', 'thnakd.id_thnakd')
            ->select(
                'dosen_matakuliah.id_dosen_matakuliah',
                'dosen.nama_dosen',
                'matakuliah.nama_matakuliah',
                'kelas.nama_kelas',
                'thnakd.thn_akd'
            )
            ->orderBy('dosen_matakuliah.id_dosen_matakuliah')
            ->get();
    }

    public function headings(): array
    {
        return [
            'NO',
            'Nama Dosen',
            'Nama Matakuliah',
            'Nama Kelas',
            'Tahun Akademik'

        ];
    }
}
