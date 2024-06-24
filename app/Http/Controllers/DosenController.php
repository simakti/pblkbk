<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data_dosen = DB::table('dosen')
        //     ->join('jurusan', 'dosen.id_jurusan', '=', 'jurusan.id_jurusan')
        //     ->join('prodi', 'dosen.id_prodi', '=', 'prodi.id_prodi')
        //     ->select('dosen.*', 'jurusan.jurusan', 'prodi.prodi')
        //     ->orderBy('id_dosen')
        //     ->get();
        $api_url = "https://umkm-pnp.com/heni/index.php?folder=dosen&file=index";
        $response = Http::get($api_url);
        $data_dosen = $response->object()->list;
        // dd($data_dosen->list);
        return view('admin.dosen', compact('data_dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_dosen = DB::table('dosen')->get();

        return view('admin.form.form_dosen', compact('data_dosen'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama_dosen'=>$request->nama_dosen,
            'nidn'=>$request->nidn,
            'nip'=>$request->nip,
            'gender'=>$request->gender,
            'jurusan'=>$request->jurusan,
            'prodi'=>$request->prodi,


        ];

        DB::table('dosen')->insert($data);
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
