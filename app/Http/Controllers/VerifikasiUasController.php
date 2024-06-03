<?php

namespace App\Http\Controllers;

use App\Models\VerifUas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VerifikasiUasController extends Controller
{
    public function index()
    {
        $data_verif_uas = DB::table('verif_uas')
            ->join('dosen as verifikasi', 'verif_uas.id_dosen', '=', 'verifikasi.id_dosen')
            ->join('repo_uas', 'verif_uas.id_repo_uas', '=', 'repo_uas.id_repo_uas')
            ->join('thnakd', 'repo_uas.id_thnakd', '=', 'thnakd.id_thnakd')
            ->join('matakuliah', 'repo_uas.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->join('dosen as upload', 'repo_uas.id_dosen', '=', 'upload.id_dosen')
            ->select('verif_uas.*', 'repo_uas.*', 'verifikasi.nama_dosen as nama_verifikasi', 'upload.nama_dosen as nama_upload','matakuliah.nama_matakuliah', 'matakuliah.kode_matakuliah', 'matakuliah.semester','thnakd.thn_akd')
            ->orderBy('id_verif_uas')
            ->get();

        $data_repo_uas = DB::table('repo_uas')
            ->join('thnakd', 'repo_uas.id_thnakd', '=', 'thnakd.id_thnakd')
            ->join('dosen', 'repo_uas.id_dosen', '=', 'dosen.id_dosen')
            ->join('matakuliah', 'repo_uas.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->select('repo_uas.*', 'thnakd.thn_akd','dosen.nama_dosen', 'matakuliah.nama_matakuliah', 'matakuliah.kode_matakuliah', 'matakuliah.semester')
            ->orderBy('id_repo_uas')
            ->get();

        return view('backend.verif_uas', compact('data_verif_uas', 'data_repo_uas'));
    }

    public function create()
    {
        $data_dosen = DB::table('dosen')->get();
        $data_repo_uas = DB::table('repo_uas')->get();
        return view('backend.form.form_verif_uas', compact('data_dosen', 'data_repo_uas'));
    }

    public function store(Request $request)
    {
        // Validasi permintaan
        $validator = Validator::make($request->all(), [
            'id_repo_uas' => 'required|integer|exists:repo_uas,id_repo_uas',
            'id_dosen' => 'required|integer|exists:dosen,id_dosen',
            'status_verif_uas' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_diverifikasi' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:50000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Menyimpan file dan mendapatkan path
        $filePath = '';
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('uploads/ver_files', 'public');
        }

        // Menyimpan data ke database
        VerifUas::create([
            'id_repo_uas' => $request->id_repo_uas,
            'id_dosen' => $request->id_dosen,
            'status_verif_uas' => $request->status_verif_uas,
            'catatan' => $request->catatan,
            'tanggal_diverifikasi' => $request->tanggal_diverifikasi,
            'file' => $filePath,
        ]);

        return redirect()->route('verif_uas.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $data_dosen = DB::table('dosen')->get();
        $verif_uas = VerifUas::findOrFail($id);

        return view('backend.form.form_edit_verif_uas', compact('verif_uas', 'data_dosen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_repo_uas' => 'required|integer|exists:repo_uas,id_repo_uas',
            'id_dosen' => 'required|integer|exists:dosen,id_dosen',
            'status_verif_uas' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_diverifikasi' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:50000',
        ]);

        $verif_uas = VerifUas::findOrFail($id);

        // Update data
        $verif_uas->id_repo_uas = $request->id_repo_uas;
        $verif_uas->id_dosen = $request->id_dosen;
        $verif_uas->status_verif_uas = $request->status_verif_uas;
        $verif_uas->catatan = $request->catatan;
        $verif_uas->tanggal_diverifikasi = $request->tanggal_diverifikasi;

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($verif_uas->file) {
                Storage::disk('public')->delete($verif_uas->file);
            }

            // Store new file
            $filePath = $request->file('file')->store('uploads/ver_files', 'public');
            $verif_uas->file = $filePath;
        }

        $verif_uas->save();

        return redirect()->route('verif_uas.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $verif_uas = VerifUas::findOrFail($id);

        // Delete file if exists
        if ($verif_uas->file) {
            Storage::disk('public')->delete($verif_uas->file);
        }

        $verif_uas->delete();

        return redirect()->route('verif_uas.index')->with('success', 'Data berhasil dihapus.');
    }
}
