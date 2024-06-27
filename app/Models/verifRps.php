<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifRps extends Model
{
    use HasFactory;

    protected $table = 'verif_rps';
    protected $primaryKey = 'id_verif_rps';
}
