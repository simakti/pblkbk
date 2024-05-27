<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepoRps extends Model
{
    use HasFactory;
    protected $table = 'repo_rps'; // Assuming the table name is 'verif_rps'

    protected $fillable = [
        'id_verif_rps',
        'id_dosen',
        'id_matakuliah',
        'id_thnakd',
        'file',
        'tanggal_verif',
    ];
    public $timestamps = false;
}
