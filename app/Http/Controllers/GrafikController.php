<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RepoRps;
use App\Models\RepoUas;
use App\Models\Thnakd;
use App\Models\VerifRps;

class GrafikController extends Controller
{
    public function grafik_rps()
    {

        // Query untuk mengambil data banyak pengunggahan
        // $banyak_pengunggahan = RepoRps::join('thnakd', 'repo_rps.id_thnakd', '=', 'thnakd.id_thnakd')
        //     ->select(DB::raw("thnakd.thn_akd, COUNT(repo_rps.id_repo_rps) as banyak_pengunggahan"))
        //     ->where('status', '=', '1') //
        //     ->groupBy('thnakd.thn_akd')
        //     ->pluck('banyak_pengunggahan', 'thnakd.thn_akd');
        $tahun_akademik = Thnakd::where('status', 1)->get();
        $banyak_pengunggahan = [];
        foreach ($tahun_akademik as $key => $value) {
            $data['tahun_akademik'] = $value->thn_akd;
            $data['banyak_pengunggahan'] = RepoRps::where('id_thnakd', $value->id_thnakd)->count();
            array_push($banyak_pengunggahan, $data);
        }

        $repo_rps = RepoRPS::get();
        $banyak_verifikasi = [];
        foreach ($repo_rps as $key => $value) {
            //$data['repo_rps'] = $value->id_thnakd;
            $data['banyak_verifikasi'] = VerifRps::where('id_repo_rps', $value->id_repo_rps)->count();
            array_push($banyak_verifikasi, $data);
        }

        // // Query untuk mengambil data banyak verifikasi
        // $banyak_verifikasi = VerifRps::join('repo_rps', 'verif_rps.id_repo_rps', '=', 'repo_rps.id_repo_rps')
        //     ->join('thnakd', 'repo_rps.id_thnakd', '=', 'thnakd.id_thnakd')
        //     ->select(DB::raw("thnakd.thn_akd, COUNT(verif_rps.id_verif_rps) as banyak_verifikasi"))
        //     ->where('repo_rps.type', '=', '0')
        //     ->groupBy('thnakd.thn_akd')
        //     ->pluck('banyak_verifikasi', 'thnakd.thn_akd');

        // Query untuk mengambil data semester
        $semester = Thnakd::select('thn_akd')->groupBy('thn_akd')->pluck('thn_akd');

        // Mengirim data ke view
        return response()->json([
            'message' => 'Success',
            'data' => [
                'banyak_pengunggahan' => $banyak_pengunggahan,
                'banyak_verifikasi' => $banyak_verifikasi,
            ]
        , 200]);
        // return view('admin.repo_rps', compact('banyak_pengunggahan', 'banyak_verifikasi', 'semester'));
    }

    public function grafik_uas()
    {
        $tahun_akademik = Thnakd::get();
        $banyak_pengunggahan = [];
        foreach ($tahun_akademik as $value) {
            $data['tahun_akademik'] = $value->thn_akd;
            $data['banyak_pengunggahan'] = RepoUas::where('id_thnakd', $value->id_thnakd)->count();
            array_push($banyak_pengunggahan, $data);
        }

        return response()->json([
            'message' => 'Success',
            'data' => [
                'banyak_pengunggahan' => $banyak_pengunggahan,
            ]
        ], 200);
    }


}
