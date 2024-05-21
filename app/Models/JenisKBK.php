<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKBK extends Model
{
    use HasFactory;

    protected $table = 'jenis_kbk';
    public $timestamps = false;

    protected $fillable = [
        'jenis_kbk',
        'deskripsi',
    ];
}
