<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data_kelas = DB::table('kelas')
        //     ->join('prodi', 'kelas.id_prodi', '=', 'prodi.id_prodi')
        //     ->join('thnakd', 'kelas.id_thnakd', '=', 'thnakd.id_thnakd')
        //     ->select('kelas.*', 'thnakd.thn_akd', 'prodi.prodi')
        //     ->orderBy('id_kelas')
        //     ->get();
        $api_url = "https://umkm-pnp.com/heni/index.php?folder=mahasiswa&file=kelas";
        $response = Http::get($api_url);
        $data_kelas = $response->object()->list;
        return view('admin.kelas', compact('data_kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'kode_kelas' => $request->nama_dosen,
            'nama_kelas' => $request->nidn,
            'id_prodi' => $request->id_prodi,
            'id_thnakd' => $request->id_thnakd

        ];

        DB::table('kelas')->insert($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
