<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepoRps extends Model
{
    protected $table = 'repo_rps';
    protected $primaryKey = 'id_repo_rps';
    public $timestamps = false;

    public function thnakd()
    {
        return $this->belongsTo(Thnakd::class, 'id_thnakd');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matakuliah');
    }
}
