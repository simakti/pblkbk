<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenMatkul extends Model
{
    use HasFactory;
    protected $table = 'dosen_matakuliah';
    public $timestamps = false;
}
