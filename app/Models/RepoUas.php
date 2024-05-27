<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepoUas extends Model
{
    use HasFactory;
    protected $table = 'repo_uas'; // Assuming the table name is 'verif_rps'

    protected $fillable = [
        'id_verif_uas',
        'id_dosen',
        'id_matakuliah',
        'id_thnakd',
        'file',
    ];
    public $timestamps = false;
}
