<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifRps extends Model
{
    protected $table = 'verif_uas';

    public $timestamps = false;

    protected $fillable = [
        'id_repo_rps',
        'id_pimpinan_prodi',
        'id_penguruskbk',
        'status_verif_rps',
        'catatan',
        'tanggal_diverifikasi',
    ];

}
