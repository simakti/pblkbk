<?php

namespace App\Http\Controllers;

use App\Models\Rps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RpsController extends Controller
{
    public function index()
    {
        $data_verif_rps = DB::table('verif_rps')
            ->join('dosen', 'verif_rps.id_dosen', '=', 'dosen.id_dosen')
            ->select('verif_rps.*', 'dosen.nama_dosen')
            ->orderBy('id_verif_rps')
            ->get();
        return view('backend.rps', compact('data_verif_rps'));
    }

    public function create()
    {
        $data_dosen = DB::table('dosen')->get();
        return view('backend.form.form_rps', compact('data_dosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:255',
            'id_verif_rps' => 'required|integer|exists:verif_rps,id_verif_rps',
            'id_dosen' => 'required|integer|exists:dosen,id_dosen',
            'file' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_verif' => 'required|date',
        ]);

        $data = [
            'status' => $request->status,
            'id_verif_rps' => $request->id_verif_rps,
            'id_dosen' => $request->id_dosen,
            'file' => $request->file,
            'catatan' => $request->catatan,
            'tanggal_verif' => $request->tanggal_verif,
        ];

        DB::table('verif_rps')->insert($data);

        return redirect()->route('rps.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_dosen = DB::table('dosen')->get();
        $rps = Rps::where('id_verif_rps', $id)->first();
        return view('backend.form.form_edit_rps', compact('data_dosen','rps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_verif_rps' => 'required|string|max:255',
            'id_dosen' => 'required|string|max:255',
            'file' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_verif' => 'required|date',
        ]);

        $data = [
            'id_verif_rps' => $request->id_verif_rps,
            'id_dosen' => $request->id_dosen,
            'file' => $request->file,
            'status' => $request->status,
            'catatan' => $request->catatan,
            'tanggal_verif' => $request->tanggal_verif,
        ];

        DB::table('verif_rps')->where('id_verif_rps', $id)->update($data);

        return redirect()->route('rps.index')->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    { 
        DB::table('verif_rps')->where('id_verif_rps', $id)->delete();
        return redirect()->route('rps.index')->with('success', 'Data berhasil dihapus.');
    }
}
