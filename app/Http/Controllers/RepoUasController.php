<?php

namespace App\Http\Controllers;

use App\Models\RepoUas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RepoUasController extends Controller
{
    public function index()
    {
        $data_repo_uas = DB::table('repo_uas')
            ->join('thnakd', 'repo_uas.id_thnakd', '=', 'thnakd.id_thnakd')
            ->join('dosen', 'repo_uas.id_dosen', '=', 'dosen.id_dosen')
            ->join('matakuliah', 'repo_uas.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->select('repo_uas.*', 'thnakd.thn_akd','dosen.nama_dosen', 'matakuliah.nama_matakuliah', 'matakuliah.kode_matakuliah', 'matakuliah.semester')
            ->orderBy('id_repo_uas')
            ->get();

        return view('backend.repo_uas', compact('data_repo_uas'));
    }

    public function create()
    {
        $data_thnakd = DB::table('thnakd')->get();
        $data_dosen = DB::table('dosen')->get();
        $data_matakuliah = DB::table('matakuliah')->get();

        return view('backend.form.form_repo_uas', compact('data_thnakd', 'data_dosen', 'data_matakuliah'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'id_thnakd' => 'required|integer|exists:thnakd,id_thnakd',
            'id_dosen' => 'required|integer|exists:dosen,id_dosen',
            'id_matakuliah' => 'required|integer|exists:matakuliah,id_matakuliah',
            'file' => 'required|file|mimes:pdf,doc,docx|max:50000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Store the file and get the path
    $filename = '';
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName(); // Mendapatkan nama asli file

        $path = 'public/uploads/ver_files/';
        $file->storeAs($path, $filename); // Simpan file dengan nama aslinya
    }

        // Prepare data to be stored
    $data = [
        'id_dosen' => $request->id_dosen,
        'id_matakuliah' => $request->id_matakuliah,
        'id_thnakd' => $request->id_thnakd,
        'file' =>$filename, // Save only the file name
    ];


    // Create a new VerifRps record
    RepoUas::create($data);

    // Redirect with success message
    return redirect()->route('repo_uas.index')->with('success', 'Data berhasil disimpan.');
}


    public function edit($id)
    {
        $data_thnakd = DB::table('thnakd')->get();
        $data_dosen = DB::table('dosen')->get();
        $data_matakuliah = DB::table('matakuliah')->get();
        $repo_uas = RepoUas::findOrFail($id);

        return view('backend.form.form_edit_repo_uas', compact('repo_uas', 'data_thnakd', 'data_dosen', 'data_matakuliah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_thnakd' => 'required|integer',
            'id_dosen' => 'required|integer',
            'id_matakuliah' => 'required|integer',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:50000',
        ]);

        $repo_uas = RepoUas::findOrFail($id);

        // Update data
        $repo_uas->id_thnakd = $request->id_thnakd;
        $repo_uas->id_dosen = $request->id_dosen;
        $repo_uas->id_matakuliah = $request->id_matakuliah;

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($repo_uas->file) {
                Storage::disk('public')->delete($repo_uas->file);
            }

            // Store new file
            $filePath = $request->file('file')->store('uploads/ver_files', 'public');
            $repo_uas->file = $filePath;
        }

        $repo_uas->save();

        return redirect()->route('repo_uas.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $repo_uas = RepoUas::findOrFail($id);

        // Delete file if exists
        if ($repo_uas->file) {
            Storage::disk('public')->delete($repo_uas->file);
        }

        $repo_uas->delete();

        return redirect()->route('repo_uas.index')->with('success', 'Data berhasil dihapus.');
    }
}
