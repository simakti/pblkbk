<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';

    // Menambahkan properti $fillable untuk atribut yang dapat diisi
    protected $fillable = [
        'kode_matakuliah',
        'nama_matakuliah',
        'TP',
        'sks',
        'jam',
        'sks_teori',
        'sks_praktek',
        'jam_teori',
        'jam_praktek',
        'semester',
        'id_kurikulum'
    ];

    // Mendefinisikan relasi hasMany dengan model BeritaAcara
    public function beritaAcara()
    {
        return $this->hasMany(BeritaAcara::class, 'id_matakuliah', 'id_matakuliah');
    }
}

