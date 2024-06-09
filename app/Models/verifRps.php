<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifRps extends Model
{
    protected $table = 'verif_uas';

    public $timestamps = false;

    protected $fillable = [
        'id_repo_uas',
        'id_dosen',
        'status_verif_uas',
        'catatan',
        'tanggal_diverifikasi',
    ];
}
