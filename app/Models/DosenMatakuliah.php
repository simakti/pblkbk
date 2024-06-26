<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenMatakuliah extends Model
{
    use HasFactory;

    protected $table = 'dosen_matakuliah';

    protected $fillable = [
        'id_dosen',
        'id_matakuliah',
        'id_kelas',
        'id_thnakd',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matakuliah');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function thnakd()
    {
        return $this->belongsTo(Thnakd::class, 'id_thnakd');
    }
}
