<?php

namespace App\Http\Controllers;

use App\Models\verifRps;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\BeritaAcara;
use Illuminate\Http\Request;
use App\Models\BeritaAcaraRps;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BeritaAcaraRpsController extends Controller
{
    public function index()
    {
        // Fetch data from multiple tables using joins
        $data_verif_rps = DB::table('verif_rps')
            ->join('repo_rps', 'verif_rps.id_repo_rps', '=', 'repo_rps.id_repo_rps')
            ->join('thnakd', 'repo_rps.id_thnakd', '=', 'thnakd.id_thnakd')
            ->join('matakuliah', 'repo_rps.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->join('dosen as upload', 'repo_rps.id_dosen', '=', 'upload.id_dosen')
            ->select('verif_rps.*', 'repo_rps.*',  'upload.nama_dosen as nama_upload', 'matakuliah.nama_matakuliah', 'matakuliah.kode_matakuliah', 'matakuliah.semester', 'thnakd.thn_akd')
            ->orderBy('verif_rps.id_verif_rps')
            ->get();

        // Map verif_rps data to berita_acara_rps data
        foreach ($data_verif_rps as $data) {
            $data->id_berita_acara_rps = $data->id_verif_rps; // Adjust this based on your actual id structure
        }

        return view('admin.berita_acara_rps', compact('data_verif_rps'));
    }

    public function create()
    {
        // Fetch all verif_rps data for the form
        $data_verif_rps = DB::table('verif_rps')->get();
        return view('admin.form.form_berita_acara_rps', compact('data_verif_rps'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id_verif_rps' => 'required|integer|exists:verif_rps,id_verif_rps',
        ]);

        // Retrieve verif_rps data based on id_verif_rps
        $verif_rps = DB::table('verif_rps')->where('id_verif_rps', $request->id_verif_rps)->first();

        // Create new BeritaAcara instance and populate it
        $beritaAcaraRps = new BeritaAcaraRps();
        $beritaAcaraRps->id_verif_rps = $request->id_verif_rps;
        $beritaAcaraRps->id_matakuliah = $verif_rps->id_matakuliah;
        $beritaAcaraRps->catatan = $verif_rps->catatan;

        // Save the new BeritaAcara instance
        $beritaAcaraRps->save();

        return redirect()->route('berita_acara_rps.index')->with('success', 'Berita Acara created successfully.');
    }

    public function edit(BeritaAcaraRps $berita_acara_rps)
    {
        // Render the edit form with the BeritaAcaraRps data
        return view('admin.form.edit_berita_acara_rps', compact('berita_acara_rps'));
    }

    public function update(Request $request, BeritaAcaraRps $berita_acara_rps)
    {
        // Validate the request data
        $request->validate([
            'id_verif_rps' => 'required|integer|exists:verif_rps,id_verif_rps',
        ]);

        // Retrieve verif_rps data based on id_verif_rps
        $verif_rps = DB::table('verif_rps')->where('id_verif_rps', $request->id_verif_rps)->first();

        // Update the BeritaAcaraRps instance with new data
        $berita_acara_rps->id_verif_rps = $request->id_verif_rps;
        $berita_acara_rps->id_matakuliah = $verif_rps->id_matakuliah;
        $berita_acara_rps->catatan = $verif_rps->catatan;

        // Save the updated BeritaAcaraRps instance
        $berita_acara_rps->save();

        return redirect()->route('berita_acara_rps.index')->with('success', 'Berita Acara updated successfully.');
    }

    public function destroy(BeritaAcaraRps $berita_acara_rps)
    {
        // Delete the BeritaAcaraRps instance
        $berita_acara_rps->delete();
        return redirect()->route('berita_acara_rps.index')->with('success', 'Berita Acara deleted successfully.');
    }

    public function generatePDF()
    {
        $data_verif_rps = verifRps::with(['repoRps.matakuliah', 'repoRps.thnakd', 'repoRps.dosen'])->get();

        $pdf = PDF::loadView('admin.cetak_rps', compact('data_verif_rps'));

        return $pdf->stream('berita_acara_rps.pdf');
    }
}
