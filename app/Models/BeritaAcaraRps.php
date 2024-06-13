<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcaraRps extends Model
{
    use HasFactory;

    protected $table = 'berita_acara_rps';

    // Menambahkan properti $fillable untuk atribut yang dapat diisi
    protected $fillable = [
        'id_verif_rps',
        'id_matakuliah',
        'catatan'
    ];

    // Mendefinisikan relasi belongsTo dengan model MataKuliah
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_matakuliah', 'id_matakuliah');
    }
}

