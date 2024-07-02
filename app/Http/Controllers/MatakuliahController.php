<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class MatakuliahController extends Controller
{
    public function index()
    {
        // Ambil data matakuliah dari API
        $api_url = "https://umkm-pnp.com/heni/index.php?folder=matakuliah&file=index";
        $response = Http::get($api_url);
        $data_matakuliah = $response->object()->list;

        // Ambil data kurikulum dari database lokal
        $kurikulum = DB::table('kurikulum')->pluck('nama_kurikulum', 'id_kurikulum');

        // Gabungkan data matakuliah dengan nama kurikulum
        foreach ($data_matakuliah as $matakuliah) {
            $matakuliah->nama_kurikulum = $kurikulum[$matakuliah->id_kurikulum] ?? 'Tidak Diketahui';
        }

        return view('admin.matakuliah', compact('data_matakuliah'));
    }

    public function store(Request $request)
    {
        $data = [
            'kode_matakuliah' => $request->kode_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'id_kurikulum' => $request->id_kurikulum,
            'TP' => $request->TP,
            'sks' => $request->sks,
            'jam' => $request->jam,
            'sks_teori' => $request->sks_teori,
            'sks_praktek' => $request->sks_praktek,
            'jam_teori' => $request->jam_teori,
            'jam_praktek' => $request->jam_praktek,
            'semester' => $request->semester
        ];

        DB::table('matakuliah')->insert($data);
        return redirect()->route('matakuliah.index')->with('success', 'Data Matakuliah berhasil ditambahkan.');
    }

    public function destroy(string $id)
    {
        DB::table('matakuliah')->where('id_matakuliah', $id)->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Data Matakuliah berhasil dihapus.');
    }
}
