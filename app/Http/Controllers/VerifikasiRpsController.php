<?php

namespace App\Http\Controllers;


use App\Models\Rps;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\verifRps;
use Illuminate\Http\Request;

class VerifikasiRpsController extends Controller
{
    public function index()
    {
        $data_verif_rps = DB::table('verif_rps')
            ->join('dosen', 'verif_rps.id_dosen', '=', 'dosen.id_dosen')
            ->join('matakuliah', 'verif_rps.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->join('thnakd', 'verif_rps.id_thnakd', '=', 'thnakd.id_thnakd')
            ->select('verif_rps.*', 'dosen.nama_dosen', 'matakuliah.nama_matakuliah', 'thnakd.thn_akd')
            ->orderBy('id_verif_rps')
            ->get();
        return view('backend.verif_rps', compact('data_verif_rps'));
    }

    public function create()
    {
        $data_dosen = DB::table('dosen')->get();
        $data_matakuliah = DB::table('matakuliah')->get();
        $data_thnakd = DB::table('thnakd')->get();
        return view('backend.form.form_verif_rps', compact('data_dosen', 'data_matakuliah', 'data_thnakd'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'id_verif_rps' => 'required|integer|unique:verif_rps,id_verif_rps',
            'id_dosen' => 'required|integer|exists:dosen,id_dosen',
            'id_matakuliah' => 'required|integer|exists:matakuliah,id_matakuliah',
            'id_thnakd' => 'required|integer|exists:thnakd,id_thnakd',
            'file' => 'required|file|max:2048',
            'status' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_verif' => 'required|date',
        ]);

        $filePath = $request->file('file')->store('public');

        $data = [
            'id_verif_rps' => $request->id_verif_rps,
            'id_dosen' => $request->id_dosen,
            'id_matakuliah' => $request->id_matakuliah,
            'id_thnakd' => $request->id_thnakd,
            'file' => $filePath,
            'status' => $request->status,
            'catatan' => $request->catatan,
            'tanggal_verif' => $request->tanggal_verif,
        ];

        verifRps::create($data);

        return redirect()->route('verif_rps.index')->with('success', 'Data berhasil disimpan.');
    }


    public function edit(string $id)
    {
        $data_dosen = DB::table('dosen')->get();
        $data_matakuliah = DB::table('matakuliah')->get();
        $data_thnakd = DB::table('thnakd')->get();

        $verif_rps = VerifRps::where('id_verif_rps', $id)->first();
        return view('backend.form.form_edit_verif_rps', compact('data_dosen', 'verif_rps', 'data_matakuliah', 'data_thnakd'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_verif_rps' => 'required|integer',
            'id_dosen' => 'required|integer',
            'id_matakuliah' => 'required|integer',
            'id_thnakd' => 'required|integer',
            'file' => 'file|max:2048', // File tidak selalu diubah
            'status' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_verif' => 'required|date',
        ]);

        $data = [
            'id_verif_rps' => $request->id_verif_rps,
            'id_dosen' => $request->id_dosen,
            'id_matakuliah' => $request->id_matakuliah,
            'id_thnakd' => $request->id_thnakd,
            'status' => $request->status,
            'catatan' => $request->catatan,
            'tanggal_verif' => $request->tanggal_verif,
        ];


        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('public/files');
            $data['file'] = $filePath;
        }

        verifRps::where('id_verif_rps', $id)->update($data);

        return redirect()->route('verif_rps.index')->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        DB::table('verif_rps')->where('id_verif_rps', $id)->delete();
        return redirect()->route('verif_rps.index')->with('success', 'Data berhasil dihapus.');
    }
}

