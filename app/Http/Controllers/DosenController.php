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
        return view('dosen', compact('data_dosen'));
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
        'nama_dosen' => $request->nama_dosen,
        'nidn' => $request->nidn,
        'nip' => $request->nip,
        'gender' => $request->gender,
        'id_jurusan' => $request->jurusan, // Assuming 'jurusan' is id_jurusan
        'id_prodi' => $request->prodi, // Assuming 'prodi' is id_prodi
        'image' => $request->image,
        'status' => $request->status
    ];

    DB::table('dosen')->insert($data);

    return redirect()->route('dosen.index')->with('success', 'Dosen created successfully');
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    $data = [
        'nama_dosen' => $request->nama_dosen,
        'nidn' => $request->nidn,
        'nip' => $request->nip,
        'gender' => $request->gender,
        'id_jurusan' => $request->jurusan, // Assuming 'jurusan' is id_jurusan
        'id_prodi' => $request->prodi, // Assuming 'prodi' is id_prodi
        'image' => $request->image,
        'status' => $request->status
    ];

    DB::table('dosen')->where('id_dosen', $id)->update($data);

    return redirect()->route('dosen.index')->with('success', 'Dosen updated successfully');
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    DB::table('dosen')->where('id_dosen', $id)->delete();

    return redirect()->route('dosen.index')->with('success', 'Dosen deleted successfully');
}
}
