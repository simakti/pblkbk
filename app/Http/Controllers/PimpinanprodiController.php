<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PimpinanprodiController extends Controller
{
    public function index()
    {
        $data_pimpinanprodi = DB::table('pimpinan_prodi')
            ->join('jabatan_pimpinan', 'pimpinan_prodi.id_jabatan_pimpinan', '=', 'jabatan_pimpinan.id_jabatan_pimpinan')
            ->join('prodi', 'pimpinan_prodi.id_prodi', '=', 'prodi.id_prodi')
            ->join('dosen', 'pimpinan_prodi.id_dosen', '=', 'dosen.id_dosen')
            ->select('pimpinan_prodi.*', 'dosen.nama_dosen', 'prodi.prodi', 'jabatan_pimpinan.jabatan_pimpinan')
            ->orderBy('id_pimpinan_prodi')
            ->get();
        return view('pimpinanprodi', compact('data_pimpinanprodi'));
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
            'id_jabatan_pimpinan'=>$request->id_jabatan_pimpinan,
            'id_prodi'=>$request->id_prodi,
            'id_dosen'=>$request->id_dosen,
            'periode'=>$request->periode,
            'status'=>$request->status
        ];

        DB::table('pimpinan_prodi')->insert($data);
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



