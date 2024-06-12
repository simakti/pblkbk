<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepoRps extends Model
{
    protected $table = 'repo_rps';

    protected $primaryKey = 'id_repo_rps';

    protected $fillable = [
        'id_thnakd',
        'id_dosen',
        'id_matakuliah',
        'file',
    ];

    public $timestamps = false;
}
