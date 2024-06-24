<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class MatakuliahController extends Controller
{
    public function index()
    {
        // $data_matakuliah = DB::table('matakuliah')
        //     ->join('kurikulum', 'matakuliah.id_kurikulum', '=', 'kurikulum.id_kurikulum')
        //     ->select('matakuliah.*', 'kurikulum.nama_kurikulum')
        //     ->orderBy('id_matakuliah')
        //     ->get();
        $api_url = "https://umkm-pnp.com/heni/index.php?folder=matakuliah&file=index";
        $response = Http::get($api_url);
        $data_matakuliah = $response->object()->list;
        return view('admin.matakuliah', compact('data_matakuliah'));
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
            'kode_matakuliah'=>$request->kode_matakuliah,
            'nama_matakuliah'=>$request->nama_matakuliah,
            'TP'=>$request->TP,
            'sks'=>$request->sks,
            'jam'=>$request->jam,
            'sks_teori'=>$request->sks_teori,
            'sks_praktek'=>$request->sks_praktek,
            'jam_teori'=>$request->jam_teori,
            'jam_praktek'=>$request->jam_praktek,
            'semester'=>$request->semester,
            'id_kurikulum'=>$request->id_kurikulum


        ];

        DB::table('matakuliah')->insert($data);
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


