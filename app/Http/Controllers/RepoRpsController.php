<?php

namespace App\Http\Controllers;

use App\Models\RepoRps;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\Thnakd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RepoRpsController extends Controller
{
    public function index()
    {
        $data_repo_rps = DB::table('repo_rps')
            ->join('thnakd', 'repo_rps.id_thnakd', '=', 'thnakd.id_thnakd')
            ->join('dosen', 'repo_rps.id_dosen', '=', 'dosen.id_dosen')
            ->join('matakuliah', 'repo_rps.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->select('repo_rps.*', 'thnakd.thn_akd', 'dosen.nama_dosen', 'matakuliah.nama_matakuliah', 'matakuliah.kode_matakuliah', 'matakuliah.semester')
            ->orderBy('id_repo_rps')
            ->get();

        return view('admin.repo_rps', compact('data_repo_rps'));
    }

    public function create()
    {
        $data_thnakd = Thnakd::all();
        $dosen = Auth::user();
        $data_matakuliah = DB::table('dosen_matakuliah')
            ->join('matakuliah', 'dosen_matakuliah.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->where('dosen_matakuliah.id_dosen', $dosen->id_dosen)
            ->select('matakuliah.id_matakuliah', 'matakuliah.nama_matakuliah')
            ->get();

        return view('admin.form.form_repo_rps', compact('data_thnakd', 'data_matakuliah'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'id_thnakd' => 'required|integer|exists:thnakd,id_thnakd',
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
            'id_dosen' => Auth::user()->id_dosen, // Menggunakan ID dosen yang sedang login
            'id_matakuliah' => $request->id_matakuliah,
            'id_thnakd' => $request->id_thnakd,
            'file' => $filename, // Simpan hanya nama file
        ];

        // Create a new RepoRps record
        RepoRps::create($data);

        // Redirect with success message
        return redirect()->route('repo_rps.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $data_thnakd = Thnakd::all();
        $dosen = Auth::user();
        $data_matakuliah = DB::table('dosen_matakuliah')
            ->join('matakuliah', 'dosen_matakuliah.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->where('dosen_matakuliah.id_dosen', $dosen->id_dosen)
            ->select('matakuliah.id_matakuliah', 'matakuliah.nama_matakuliah')
            ->get();
        $repo_rps = RepoRps::findOrFail($id);

        return view('admin.form.form_edit_repo_rps', compact('repo_rps', 'data_thnakd', 'data_matakuliah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_thnakd' => 'required|integer|exists:thnakd,id_thnakd',
            'id_matakuliah' => 'required|integer|exists:matakuliah,id_matakuliah',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:50000',
        ]);

        $repo_rps = RepoRps::findOrFail($id);

        // Update data
        $repo_rps->id_thnakd = $request->id_thnakd;
        $repo_rps->id_matakuliah = $request->id_matakuliah;

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($repo_rps->file) {
                Storage::disk('public')->delete('uploads/ver_files/' . $repo_rps->file);
            }

            // Store new file
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads/ver_files', $filename, 'public');
            $repo_rps->file = $filename;
        }

        $repo_rps->save();

        return redirect()->route('repo_rps.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $repo_rps = RepoRps::findOrFail($id);

        // Delete file if exists
        if ($repo_rps->file) {
            Storage::disk('public')->delete('uploads/ver_files/' . $repo_rps->file);
        }

        $repo_rps->delete();

        return redirect()->route('repo_rps.index')->with('success', 'Data berhasil dihapus.');
    }
}
