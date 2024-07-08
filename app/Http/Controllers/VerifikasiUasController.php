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
            ->join('repo_uas', 'verif_uas.id_repo_uas', '=', 'repo_uas.id_repo_uas')
            ->join('thnakd', 'repo_uas.id_thnakd', '=', 'thnakd.id_thnakd')
            ->join('matakuliah', 'repo_uas.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->join('dosen as upload', 'repo_uas.id_dosen', '=', 'upload.id_dosen')
            ->select('verif_uas.*', 'repo_uas.*',  'upload.nama_dosen as nama_upload', 'matakuliah.nama_matakuliah', 'matakuliah.kode_matakuliah', 'matakuliah.semester', 'thnakd.thn_akd')
            ->orderBy('id_verif_uas')
            ->get();

        $data_repo_uas = DB::table('repo_uas')
            ->join('thnakd', 'repo_uas.id_thnakd', '=', 'thnakd.id_thnakd')
            ->join('dosen', 'repo_uas.id_dosen', '=', 'dosen.id_dosen')
            ->join('matakuliah', 'repo_uas.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->select('repo_uas.*', 'thnakd.thn_akd', 'dosen.nama_dosen', 'matakuliah.nama_matakuliah', 'matakuliah.kode_matakuliah', 'matakuliah.semester')
            ->orderBy('id_repo_uas')
            ->get();

        return view('admin.verif_uas', compact('data_verif_uas', 'data_repo_uas'));
    }


    public function create()
    {
        $data_repo_uas = DB::table('repo_uas')->get();
        //dd(compact('data_dosen', 'data_repo_uas'));
        return view('admin.form.form_verif_uas', compact('data_repo_uas'));
    }

    public function store(Request $request)
    {
        // Validasi permintaan
        $validator = Validator::make($request->all(), [
            'id_repo_uas' => 'required|integer|exists:repo_uas,id_repo_uas',
            'catatan' => 'required|string',
            'tanggal_diverifikasi' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:50000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Menyimpan file dan mendapatkan path
        $filename = '';
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName(); // Mendapatkan nama asli file
            $path = 'uploads/ver_files/';
            $file->storeAs('public/' . $path, $filename); // Simpan file dengan nama aslinya
        }

        // Menyimpan data ke database
        VerifUas::create([
            'id_repo_uas' => $request->id_repo_uas,
            'status_verif_uas' => 'Diverifikasi',
            'catatan' => $request->catatan,
            'tanggal_diverifikasi' => $request->tanggal_diverifikasi,
            'file' => $filename,
        ]);

        return redirect()->route('verif_uas.index')->with('success', 'Data berhasil disimpan.');
    }


    public function edit($id)
    {
        $data_repo_uas = DB::table('repo_uas')->get();
        $verif_uas = VerifUas::findOrFail($id);

        return view('admin.form.form_edit_verif_uas', compact('verif_uas', 'data_repo_uas'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_repo_uas' => 'required|integer|exists:repo_uas,id_repo_uas',
            'catatan' => 'required|string',
            'tanggal_diverifikasi' => 'required|date',
        ]);

        $verif_uas = verifUas::findOrFail($id);

        // Update data
        $verif_uas->id_repo_uas = $request->id_repo_uas;
        $verif_uas->catatan = $request->catatan;
        $verif_uas->tanggal_diverifikasi = $request->tanggal_diverifikasi;

        $verif_uas->save();

        return redirect()->route('verif_uas.index')->with('success', 'Data berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $verif_uas = VerifUas::findOrFail($id);
        // dd($verif_uas->file);
        // Delete file if exists
        if ($verif_uas->file) {
            Storage::delete('public/uploads/ver_files/' . $verif_uas->file);
        }

        $verif_uas->delete();

        return redirect()->route('verif_uas.index')->with('success', 'Data berhasil dihapus.');
    }
}
