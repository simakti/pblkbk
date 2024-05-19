<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisKBK extends Model
{
    protected $table = 'jenis_kbk';
    public $timestamps = false;

    protected $fillable = [
        'jenis_kbk',
        'deskripsi'
    ];
}
?>
