<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_dosen = DB::table('dosen')
            ->join('jurusan', 'dosen.id_jurusan', '=', 'jurusan.id_jurusan')
            ->join('prodi', 'dosen.id_prodi', '=', 'prodi.id_prodi')
            ->select('dosen.*', 'jurusan.jurusan', 'prodi.prodi')
            ->orderBy('id_dosen')
            ->get();
        return view('backend.dosen', compact('data_dosen'));
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
            'nama_dosen'=>$request->nama_dosen,
            'nidn'=>$request->nidn,
            'nip'=>$request->nip,
            'gender'=>$request->gender,
            'jurusan'=>$request->jurusan,
            'prodi'=>$request->prodi,
            'image'=>$request->image,
            'status'=>$request->status

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


}