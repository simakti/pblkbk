<?php

namespace App\Models;

use App\Models\BeritaAcaraRps;
use App\Models\DosenMatkul;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        return $this->hasMany(BeritaAcaraRps::class, 'id_matakuliah', 'id_matakuliah');
    }

    public function dosenMatakuliah()
    {
        return $this->hasMany(DosenMatkul::class, 'id_matakuliah');
    }
}
