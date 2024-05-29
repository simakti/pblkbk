<?php

namespace App\Http\Controllers;
use App\Models\RepoRps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RepoRpsController extends Controller
{
    public function index()
    {
        $data_repo_rps = DB::table('repo_rps')
            ->join('dosen', 'repo_rps.id_dosen', '=', 'dosen.id_dosen')
            ->join('matakuliah', 'repo_rps.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->join('thnakd', 'repo_rps.id_thnakd', '=', 'thnakd.id_thnakd')
            ->select('repo_rps.*', 'dosen.nama_dosen', 'matakuliah.nama_matakuliah', 'thnakd.thn_akd')
            ->orderBy('id_repo_rps')
            ->get();
        return view('backend.repo_rps', compact('data_repo_rps'));
    }

    public function create()
    {
        $data_dosen = DB::table('dosen')->get();
        $data_matakuliah = DB::table('matakuliah')->get();
        $data_thnakd = DB::table('thnakd')->get();
        return view('backend.form.form_repo_rps', compact('data_dosen', 'data_matakuliah', 'data_thnakd'));
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


    // Create a new RepoRps record
    RepoRps::create($data);

    // Redirect with success message
    return redirect()->route('repo_rps.index')->with('success', 'Data berhasil disimpan.');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_dosen = DB::table('dosen')->get();
        $data_matakuliah = DB::table('matakuliah')->get();
        $data_thnakd = DB::table('thnakd')->get();
        $repo_rps = RepoRps::where('id_repo_rps', $id)->first();
        return view('backend.form.form_edit_repo_rps', compact('data_dosen', 'repo_rps', 'data_matakuliah', 'data_thnakd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_repo_rps' => 'required|integer',
            'id_dosen' => 'required|integer',
            'id_matakuliah' => 'required|integer',
            'id_thnakd' => 'required|integer',
            'file' => 'nullable|file|max:2048',
            'status' => 'required|string|max:255',
            'catatan' => 'nullable|string',
            'tanggal_verif' => 'required|date',
        ]);

        $data = [
            'id_repo_rps' => $request->id_repo_rps,
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

        RepoRps::where('id_repo_rps', $id)->update($data);

        return redirect()->route('repo_rps.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('repo_rps')->where('id_repo_rps', $id)->delete();
        return redirect()->route('repo_rps.index')->with('success', 'Data berhasil dihapus.');
    }
}
