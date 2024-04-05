<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KurikulumController extends Controller
{
    public function index()
    {
        $data_kurikulum = DB::table('kurikulum')
            ->join('prodi', 'kurikulum.id_prodi', '=', 'prodi.id_prodi')
            ->select('kurikulum.*', 'prodi.prodi')
            ->orderBy('id_kurikulum')
            ->get();
        return view('kurikulum', compact('data_kurikulum'));
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
            'kode_kurikulum'=>$request->kode_kurikulum,
            'nama_kurikulum'=>$request->nama_kurikulum,
            'tahun'=>$request->tahun,
            'id_prodi'=>$request->id_prodi,
            'status'=>$request->status


        ];

        DB::table('kurikulum')->insert($data);
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
