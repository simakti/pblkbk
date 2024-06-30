<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifUas extends Model
{
    protected $table = 'verif_uas';
    protected $primaryKey = 'id_verif_uas'; // Sesuaikan dengan nama kolom primary key

    public $timestamps = false; // Nonaktifkan timestamps

    protected $fillable = [
        'id_repo_uas',
        'status_verif_uas', // Sesuaikan dengan nama kolom yang benar
        'catatan',
        'tanggal_diverifikasi',
    ];

    // Definisikan relasi jika ada
    public function repoUas()
    {
        return $this->belongsTo(RepoUAS::class, 'id_repo_uas', 'id_repo_uas');
    }
}
