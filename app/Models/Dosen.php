<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Authenticatable
{
    use HasFactory;

    protected $table = 'dosen';

    public function dosenMatakuliah()
    {
        return $this->hasMany(DosenMatakuliah::class, 'id_dosen');
    }

    public function matakuliah()
    {
        return $this->hasManyThrough(Matakuliah::class, DosenMatakuliah::class, 'id_dosen', 'id_matakuliah', 'id', 'id_matakuliah');
    }
}
