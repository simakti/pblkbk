<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaAcaraUas extends Model
{
    use HasFactory;

    protected $table = 'berita_acara_uas';

    // Menambahkan properti $fillable untuk atribut yang dapat diisi
    protected $fillable = [
        'id_verif_uas',
        'id_matakuliah',
        'catatan'
    ];

    // Mendefinisikan relasi belongsTo dengan model MataKuliah
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_matakuliah', 'id_matakuliah');
    }
}
