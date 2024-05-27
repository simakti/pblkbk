<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifUas extends Model
{
    protected $table = 'verif_uas'; // Assuming the table name is 'verif_uas'

    protected $fillable = [
        'id_verif_uas',
        'id_dosen',
        'id_matakuliah',
        'id_thnakd',
        'file',
        'status',
        'catatan',
        'tanggal_verif',
    ];
    public $timestamps = false;
}
