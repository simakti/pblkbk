<?php

namespace App\Http\Controllers;

use App\Models\Thnakd;
use App\Models\RepoRps;
use App\Models\RepoUas;
use App\Models\verifRps;
use App\Models\VerifUas;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function grafik_rps()
    {
        $tahun_akademik = Thnakd::where('status', 1)->get();
        $banyak_pengunggahan = [];
        foreach ($tahun_akademik as $value) {
            $data['tahun_akademik'] = $value->thn_akd;
            $data['banyak_pengunggahan'] = RepoRps::where('id_thnakd', $value->id_thnakd)->count();
            array_push($banyak_pengunggahan, $data);
        }

        $repo_rps = RepoRps::get();
        $banyak_verifikasi = [];
        foreach ($repo_rps as $value) {
            $data['repo_rps'] = $value->id_thnakd;
            $data['banyak_verifikasi'] = verifRps::where('id_repo_rps', $value->id_repo_rps)->count();
            array_push($banyak_verifikasi, $data);
        }

        return response()->json([
            'message' => 'Success',
            'data' => [
                'banyak_pengunggahan' => $banyak_pengunggahan,
                'banyak_verifikasi' => $banyak_verifikasi,
            ]
        ], 200);
    }

    public function grafik_uas()
    {
        $tahun_akademik = Thnakd::where('status', 1)->get();
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

    public function grafik_verifikasi_rps()
    {
        $tahun_akademik = Thnakd::where('status', 1)->get();
        $data_grafik = [];

        foreach ($tahun_akademik as $tahun) {
            $data = [
                'tahun_akademik' => $tahun->thn_akd,
                'jumlah_verifikasi' => verifRps::whereHas('repoRps', function ($query) use ($tahun) {
                    $query->where('id_thnakd', $tahun->id_thnakd);
                })->count(),
            ];

            array_push($data_grafik, $data);
        }

        return response()->json([
            'message' => 'Success',
            'data' => $data_grafik,
        ], 200);
    }

    public function grafik_verifikasi_uas()
    {
        $tahun_akademik = Thnakd::where('status', 1)->get();
        $data_grafik = [];

        foreach ($tahun_akademik as $tahun) {
            $data = [
                'tahun_akademik' => $tahun->thn_akd,
                'jumlah_verifikasi' => VerifUas::whereHas('repoUas', function ($query) use ($tahun) {
                    $query->where('id_thnakd', $tahun->id_thnakd);
                })->count(),
            ];

            array_push($data_grafik, $data);
        }

        return response()->json([
            'message' => 'Success',
            'data' => $data_grafik,
        ], 200);
    }

    public function grafikRps()
    {
        $tahun_akademik = Thnakd::where('status', 1)->get();
        $data_grafik = [];

        foreach ($tahun_akademik as $tahun) {
            $data = [
                'tahun_akademik' => $tahun->thn_akd,
                'banyak_pengunggahan' => RepoRps::where('id_thnakd', $tahun->id_thnakd)->count(),
                'banyak_verifikasi' => verifRps::whereHas('repoRps', function ($query) use ($tahun) {
                    $query->where('id_thnakd', $tahun->id_thnakd);
                })->count(),
            ];

            array_push($data_grafik, $data);
        }

        return response()->json([
            'message' => 'Success',
            'data' => $data_grafik,
        ], 200);
    }
}
