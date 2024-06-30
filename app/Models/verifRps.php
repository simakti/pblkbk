<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VerifRps extends Model
{
    protected $table = 'verif_rps';
    protected $primaryKey = 'id_verif_rps'; // Tambahkan jika primary key tidak bernama 'id'

    public $timestamps = false; // Nonaktifkan timestamps

    protected $fillable = [
        'id_repo_rps',
        'status_verif_rps',
        'catatan',
        'tanggal_diverifikasi',
    ];

    // Definisikan relasi jika ada
    public function repoRps()
    {
        return $this->belongsTo(RepoRPS::class, 'id_repo_rps', 'id_repo_rps');
    }

    // Tambahkan validasi jika diperlukan
    // public static function rules()
    // {
    //     return [
    //         'id_repo_rps' => 'required|exists:repo_rps,id_repo_rps',
    //         'status_verif_rps' => 'required',
    //         'tanggal_diverifikasi' => 'nullable|date',
    //     ];
    // }
}
