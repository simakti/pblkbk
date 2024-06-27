<?php

namespace App\Http\Controllers;

use App\Models\VerifRps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VerifikasiRpsController extends Controller
{
    public function index()
    {
        $data_verif_rps = DB::table('verif_rps')
            ->join('repo_rps', 'verif_rps.id_repo_rps', '=', 'repo_rps.id_repo_rps')
            ->join('thnakd', 'repo_rps.id_thnakd', '=', 'thnakd.id_thnakd')
            ->join('matakuliah', 'repo_rps.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->join('dosen as upload', 'repo_rps.id_dosen', '=', 'upload.id_dosen')
            ->select('verif_rps.*', 'repo_rps.*',  'upload.nama_dosen as nama_upload', 'matakuliah.nama_matakuliah', 'matakuliah.kode_matakuliah', 'matakuliah.semester', 'thnakd.thn_akd')
            ->orderBy('id_verif_rps')
            ->get();

        $data_repo_rps = DB::table('repo_rps')
            ->join('thnakd', 'repo_rps.id_thnakd', '=', 'thnakd.id_thnakd')
            ->join('dosen', 'repo_rps.id_dosen', '=', 'dosen.id_dosen')
            ->join('matakuliah', 'repo_rps.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->select('repo_rps.*', 'thnakd.thn_akd', 'dosen.nama_dosen', 'matakuliah.nama_matakuliah', 'matakuliah.kode_matakuliah', 'matakuliah.semester')
            ->orderBy('id_repo_rps')
            ->get();

        return view('admin.verif_rps', compact('data_verif_rps', 'data_repo_rps'));
    }

    public function create()
    {
        $data_repo_rps = DB::table('repo_rps')->get();
        //dd(compact('data_dosen', 'data_repo_rps'));
        return view('admin.form.form_verif_rps', compact('data_repo_rps'));
    }

    public function store(Request $request)
{
    // Validasi permintaan
    $validator = Validator::make($request->all(), [
        'id_repo_rps' => 'required|integer|exists:repo_rps,id_repo_rps',
        'status_verif_rps' => 'required|string|max:255',
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
    VerifRps::create([
        'id_repo_rps' => $request->id_repo_rps,
        'status_verif_rps' => $request->status_verif_rps,
        'catatan' => $request->catatan,
        'tanggal_diverifikasi' => $request->tanggal_diverifikasi,
        'file' => $filePath,
    ]);

    return redirect()->route('verif_rps.index')->with('success', 'Data berhasil disimpan.');
}


    public function edit($id)
    {
        $data_dosen = DB::table('dosen')->get();
        $verif_rps = VerifRps::findOrFail($id);

        return view('admin.form.form_edit_verif_rps', compact('verif_rps', 'data_dosen'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_repo_rps' => 'required|integer|exists:repo_rps,id_repo_rps',
            'id_dosen' => 'required|integer|exists:dosen,id_dosen',
            'status_verif_rps' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_diverifikasi' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:50000',
        ]);

        $verif_rps = VerifRps::findOrFail($id);

        // Update data
        $verif_rps->id_repo_rps = $request->id_repo_rps;
        $verif_rps->id_dosen = $request->id_dosen;
        $verif_rps->status_verif_rps = $request->status_verif_rps;
        $verif_rps->catatan = $request->catatan;
        $verif_rps->tanggal_diverifikasi = $request->tanggal_diverifikasi;

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($verif_rps->file) {
                Storage::disk('public')->delete($verif_rps->file);
            }

            // Store new file
            $filePath = $request->file('file')->store('uploads/ver_files', 'public');
            $verif_rps->file = $filePath;
        }

        $verif_rps->save();

        return redirect()->route('verif_rps.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $verif_rps = VerifRps::findOrFail($id);

        // Delete file if exists
        if ($verif_rps->file) {
            Storage::disk('public')->delete($verif_rps->file);
        }

        $verif_rps->delete();

        return redirect()->route('verif_rps.index')->with('success', 'Data berhasil dihapus.');
    }
}
