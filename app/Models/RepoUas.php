<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepoUAS extends Model
{
    use HasFactory;

    protected $table = 'repo_uas';
    protected $primaryKey = 'id_repo_uas'; // Tentukan nama kolom primary key

    public $timestamps = false; // Nonaktifkan timestamps

    protected $fillable = [
        'id_thnakd',
        'id_dosen',
        'id_matakuliah',
        'file',
    ];

    public function thnakd()
    {
        return $this->belongsTo(Thnakd::class, 'id_thnakd', 'id_thnakd');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matakuliah', 'id_matakuliah');
    }
}
