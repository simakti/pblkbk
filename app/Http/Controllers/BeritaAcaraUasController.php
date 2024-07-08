<?php

namespace App\Http\Controllers;

use App\Models\VerifUas;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\BeritaAcaraUas;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BeritaAcaraUasController extends Controller
{
    public function index()
    {
        // Fetch data from multiple tables using joins
        $data_verif_uas = DB::table('verif_uas')
            ->join('repo_uas', 'verif_uas.id_repo_uas', '=', 'repo_uas.id_repo_uas')
            ->join('thnakd', 'repo_uas.id_thnakd', '=', 'thnakd.id_thnakd')
            ->join('matakuliah', 'repo_uas.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->join('dosen as upload', 'repo_uas.id_dosen', '=', 'upload.id_dosen')
            ->select('verif_uas.*', 'repo_uas.*',  'upload.nama_dosen as nama_upload', 'matakuliah.nama_matakuliah', 'matakuliah.kode_matakuliah', 'matakuliah.semester', 'thnakd.thn_akd')
            ->orderBy('verif_uas.id_verif_uas')
            ->get();

        // Map verif_uas data to berita_acara_uas data
        foreach ($data_verif_uas as $data) {
            $data->id_berita_acara_uas = $data->id_verif_uas; // Adjust this based on your actual id structure
        }

        return view('admin.berita_acara_uas', compact('data_verif_uas'));
    }

    public function create()
    {
        // Fetch all verif_uas data for the form
        $data_verif_uas = DB::table('verif_uas')->get();
        return view('admin.form.form_berita_acara_uas', compact('data_verif_uas'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id_verif_uas' => 'required|integer|exists:verif_uas,id_verif_uas',
        ]);

        // Retrieve verif_uas data based on id_verif_uas
        $verif_uas = DB::table('verif_uas')->where('id_verif_uas', $request->id_verif_uas)->first();

        // Create new BeritaAcara instance and populate it
        $beritaAcaraUas = new BeritaAcaraUas();
        $beritaAcaraUas->id_verif_uas = $request->id_verif_uas;
        $beritaAcaraUas->id_matakuliah = $verif_uas->id_matakuliah;
        $beritaAcaraUas->catatan = $verif_uas->catatan;

        // Save the new BeritaAcara instance
        $beritaAcaraUas->save();

        return redirect()->route('berita_acara_uas.index')->with('success', 'Berita Acara created successfully.');
    }

    public function edit(BeritaAcaraUas $berita_acara_uas)
    {
        // Render the edit form with the BeritaAcaraUas data
        return view('admin.form.edit_berita_acara_uas', compact('berita_acara_uas'));
    }

    public function update(Request $request, BeritaAcaraUas $berita_acara_uas)
    {
        // Validate the request data
        $request->validate([
            'id_verif_uas' => 'required|integer|exists:verif_uas,id_verif_uas',
        ]);

        // Retrieve verif_uas data based on id_verif_uas
        $verif_uas = DB::table('verif_uas')->where('id_verif_uas', $request->id_verif_uas)->first();

        // Update the BeritaAcaraUas instance with new data
        $berita_acara_uas->id_verif_uas = $request->id_verif_uas;
        $berita_acara_uas->id_matakuliah = $verif_uas->id_matakuliah;
        $berita_acara_uas->catatan = $verif_uas->catatan;

        // Save the updated BeritaAcaraUas instance
        $berita_acara_uas->save();

        return redirect()->route('berita_acara_uas.index')->with('success', 'Berita Acara updated successfully.');
    }

    public function destroy(BeritaAcaraUas $berita_acara_uas)
    {
        // Delete the BeritaAcaraUas instance
        $berita_acara_uas->delete();
        return redirect()->route('berita_acara_uas.index')->with('success', 'Berita Acara deleted successfully.');
    }

    public function generatePDF()
    {
        $data_verif_uas = VerifUas::with(['repoUas.matakuliah', 'repoUas.thnakd', 'repoUas.dosen'])->get();

        $pdf = PDF::loadView('admin.cetak_uas', compact('data_verif_uas'));

        return $pdf->stream('berita_acara_uas.pdf');
    }
}
