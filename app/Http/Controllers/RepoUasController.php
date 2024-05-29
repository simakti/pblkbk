<?php

namespace App\Http\Controllers;
use App\Models\RepoUas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RepoUasController extends Controller
{
    public function index()
    {
        $data_repo_uas = DB::table('repo_uas')
            ->join('dosen', 'repo_uas.id_dosen', '=', 'dosen.id_dosen')
            ->join('matakuliah', 'repo_uas.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->join('thnakd', 'repo_uas.id_thnakd', '=', 'thnakd.id_thnakd')
            ->select('repo_uas.*', 'dosen.nama_dosen', 'matakuliah.nama_matakuliah', 'thnakd.thn_akd')
            ->orderBy('id_repo_uas')
            ->get();
        return view('backend.repo_uas', compact('data_repo_uas'));
    }

    public function create()
    {
        $data_dosen = DB::table('dosen')->get();
        $data_matakuliah = DB::table('matakuliah')->get();
        $data_thnakd = DB::table('thnakd')->get();
        return view('backend.form.form_repo_uas', compact('data_dosen', 'data_matakuliah', 'data_thnakd'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the request
    $validator = Validator::make($request->all(),[
        'id_dosen' => 'required|integer|exists:dosen,id_dosen',
        'id_matakuliah' => 'required|integer|exists:matakuliah,id_matakuliah',
        'id_thnakd' => 'required|integer|exists:thnakd,id_thnakd',
        'file' => 'required|file|max:50000',
        'tanggal_verif' => 'required|date',
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
        'status' => $request->status,
        'catatan' => $request->catatan,
        'tanggal_verif' => $request->tanggal_verif,
    ];


    // Create a new RepoUas record
    RepoUas::create($data);

    // Redirect with success message
    return redirect()->route('repo_uas.index')->with('success', 'Data berhasil disimpan.');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_dosen = DB::table('dosen')->get();
        $data_matakuliah = DB::table('matakuliah')->get();
        $data_thnakd = DB::table('thnakd')->get();
        $repo_uas = RepoUas::where('id_repo_uas', $id)->first();
        return view('backend.form.form_edit_repo_uas', compact('data_dosen', 'repo_uas', 'data_matakuliah', 'data_thnakd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_repo_uas' => 'required|integer',
            'id_dosen' => 'required|integer',
            'id_matakuliah' => 'required|integer',
            'id_thnakd' => 'required|integer',
            'file' => 'nullable|file|max:2048',
            'status' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_verif' => 'required|date',
        ]);

        $data = [
            'id_repo_uas' => $request->id_repo_uas,
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
            $data['file'] = basename($filePath);
        }

        RepoUas::where('id_repo_uas', $id)->update($data);

        return redirect()->route('repo_uas.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('repo_uas')->where('id_repo_uas', $id)->delete();
        return redirect()->route('repo_uas.index')->with('success', 'Data berhasil dihapus.');
    }
}
