<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdiController extends Controller
{
    public function index()
    {
        $data_prodi = DB::table('prodi')
            ->join('jurusan', 'prodi.id_jurusan', '=', 'jurusan.id_jurusan')
            ->select('prodi.*', 'jurusan.jurusan')
            ->orderBy('id_prodi')
            ->get();
        return view('admin.prodi', compact('data_prodi'));
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
            'kode_prodi'=>$request->kode_prodi,
            'prodi'=>$request->prodi,
            'id_jurusan'=>$request->id_jurusan,
            'jenjang'=>$request->jenjang


        ];

        DB::table('prodi')->insert($data);
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

