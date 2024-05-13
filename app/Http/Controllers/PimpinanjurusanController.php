<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PimpinanjurusanController extends Controller
{
    public function index()
    {
        $data_pimpinanjurusan = DB::table('pimpinan_jurusan')
            ->join('jabatan_pimpinan', 'pimpinan_jurusan.id_jabatan_pimpinan', '=', 'jabatan_pimpinan.id_jabatan_pimpinan')
            ->join('jurusan', 'pimpinan_jurusan.id_jurusan', '=', 'jurusan.id_jurusan')
            ->join('dosen', 'pimpinan_jurusan.id_dosen', '=', 'dosen.id_dosen')
            ->select('pimpinan_jurusan.*', 'dosen.nama_dosen', 'jurusan.jurusan', 'jabatan_pimpinan.jabatan_pimpinan')
            ->orderBy('id_pimpinan_jurusan')
            ->get();
        return view('backend.pimpinanjurusan', compact('data_pimpinanjurusan'));
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
            'id_jurusan'=>$request->id_jurusan,
            'id_dosen'=>$request->id_dosen,
            'periode'=>$request->periode,
            'status'=>$request->status
        ];

        DB::table('pimpinan_jurusan')->insert($data);
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


