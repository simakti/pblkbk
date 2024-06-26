<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\RepoRps;
use App\Models\VerifRps;

class GrafikController extends Controller
{
    public function grafik_rps()
    {
        // Fetch number of uploads per academic year
        $banyakPengunggahan = RepoRps::join('thnakd', 'repo_rps.id_thnakd', '=', 'thnakd.id_thnakd')
            ->select(DB::raw("thnakd.thn_akd as semester, COUNT(repo_rps.id_repo_rps) as banyak_pengunggahan"))
            ->groupBy('thnakd.thn_akd')
            ->pluck('banyak_pengunggahan', 'semester');
            dd($banyakPengunggahan);

        // Fetch number of verifications per academic year
        $banyakVerifikasi = VerifRps::join('repo_rps', 'verif_rps.id_repo_rps', '=', 'repo_rps.id_repo_rps')
            ->join('thnakd', 'repo_rps.id_thnakd', '=', 'thnakd.id_thnakd')
            ->select(DB::raw("thnakd.thn_akd as semester, COUNT(verif_rps.id_verif_rps) as banyak_verifikasi"))
            ->groupBy('thnakd.thn_akd')
            ->pluck('banyak_verifikasi', 'semester');
            dd($banyakVerifikasi);
        // Fetch list of academic years
        $semester = RepoRps::join('thnakd', 'repo_rps.id_thnakd', '=', 'thnakd.id_thnakd')
            ->select(DB::raw("thnakd.thn_akd as semester"))
            ->groupBy('thnakd.thn_akd')
            ->pluck('semester');
            dd($semester);
        return view('admin.content.pimpinanJurusan.GrafikRPS', compact('banyakPengunggahan', 'banyakVerifikasi', 'semester'));
    }
}
