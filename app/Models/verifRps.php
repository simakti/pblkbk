<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifRps extends Model
{
    protected $table = 'verif_rps';

    public $timestamps = false;

    protected $fillable = [
        'id_repo_rps',
        'id_dosen',
        'status_verif_rps',
        'catatan',
        'tanggal_diverifikasi',
    ];
}
