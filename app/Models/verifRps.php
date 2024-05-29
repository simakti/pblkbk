<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class verifRps extends Model
{
    protected $table = 'verif_rps';
    protected $primaryKey = 'id_verif_rps';
    protected $fillable = [
        'id_verif_rps',
        'id_dosen',
        'id_matakuliah',
        'id_thnakd',
        'file',
        'status',
        'catatan',
        'tanggal_verif'
    ];
}
