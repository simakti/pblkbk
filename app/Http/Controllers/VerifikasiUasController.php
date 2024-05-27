<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Uas;
use App\Models\VerifUas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifikasiUasController extends Controller
{
    public function index()
    {
        $data_verif_uas = DB::table('verif_uas')
            ->join('dosen', 'verif_uas.id_dosen', '=', 'dosen.id_dosen')
            ->join('matakuliah', 'verif_uas.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->join('thnakd', 'verif_uas.id_thnakd', '=', 'thnakd.id_thnakd')
            ->select('verif_uas.*', 'dosen.nama_dosen', 'matakuliah.kode_matakuliah', 'thnakd.thn_akd')
            ->orderBy('id_verif_uas')
            ->get();
        return view('backend.verif_uas', compact('data_verif_uas'));
    }

    public function create()
    {
        $data_dosen = DB::table('dosen')->get();
        $data_matakuliah = DB::table('matakuliah')->get();
        $data_thnakd = DB::table('thnakd')->get();
        return view('backend.form.form_verif_uas', compact('data_dosen', 'data_matakuliah', 'data_thnakd'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_verif_uas' => 'required|integer|unique:verif_uas,verif_uas',
            'id_dosen' => 'required|integer|exists:dosen,id_dosen',
            'id_matakuliah' => 'required|integer|exists:matakuliah,id_matakuliah',
            'id_thnakd' => 'required|integer|exists:thnakd,id_thnakd',
            'file' => 'required|file|max:2048', // Perubahan pada aturan validasi file
            'status' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_verif' => 'required|date',
        ]);

        // Dapatkan path penyimpanan file
        $filePath = $request->file('file')->store('public/files');

        $data = [
            'id_verif_uas' => $request->id_verif_uas,
            'id_dosen' => $request->id_dosen,
            'id_matakuliah' => $request->id_matakuliah,
            'id_thnakd' => $request->id_thnakd,
            'file' => $filePath,
            'status' => $request->status,
            'catatan' => $request->catatan,
            'tanggal_verif' => $request->tanggal_verif,
        ];

        VerifUas::create($data); // Gunakan model untuk membuat entri baru dalam basis data

        return redirect()->route('verif_uas.index')->with('success', 'Data berhasil disimpan.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_dosen = DB::table('dosen')->get();
        $data_matakuliah = DB::table('matakuliah')->get();
        $data_thnakd = DB::table('thnakd')->get();
        $verif_rps = VerifUas::where('id_verif_uas', $id)->first();
        return view('backend.form.form_edit_verif_uas', compact('data_dosen', 'verif_uas', 'data_matakuliah', 'data_thnakd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_verif_uas' => 'required|integer',
            'id_dosen' => 'required|integer',
            'id_matakuliah' => 'required|integer',
            'id_thnakd' => 'required|integer',
            'file' => 'required|file|max:2048', // Perubahan pada aturan validasi file (opsional, karena file tidak selalu diubah)
            'status' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_verif' => 'required|date',
        ]);

        $data = [
            'id_verif_uas' => $request->id_verif_uas,
            'id_dosen' => $request->id_dosen,
            'id_matakuliah' => $request->id_matakuliah,
            'id_thnakd' => $request->id_thnakd,
            'status' => $request->status,
            'catatan' => $request->catatan,
            'tanggal_verif' => $request->tanggal_verif,
        ];

        // Jika file diunggah, simpan file baru dan update path file dalam basis data
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('public/files');
            $data['file'] = $filePath;
        }

        VerifUas::where('id_verif_uas', $id)->update($data);

        return redirect()->route('verif_uas.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('verif_uas')->where('id_verif_uas', $id)->delete();
        return redirect()->route('verif_uas.index')->with('success', 'Data berhasil dihapus.');
    }
}
