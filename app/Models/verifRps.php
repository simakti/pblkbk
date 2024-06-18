<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifRps extends Model
{
    protected $table = 'verif_rps'; // Assuming the table name is 'verif_rps'

    protected $fillable = [
        'id_repo_rps',
        'id_penguruskbk',
        'status_verif_rps',
        'catatan',
        'tanggal_verif',
    ];
}
