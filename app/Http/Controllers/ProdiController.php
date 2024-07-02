<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProdiController extends Controller
{
    public function index()
    {
        // Ambil data prodi dari API
        $api_url = "https://umkm-pnp.com/heni/index.php?folder=jurusan&file=prodi";
        $response = Http::get($api_url);
        $data_prodi = $response->object()->list;

        // Ambil data jurusan dari database lokal
        $jurusan = DB::table('jurusan')->pluck('jurusan', 'id_jurusan');

        // Gabungkan data prodi dengan nama jurusan
        foreach ($data_prodi as $prodi) {
            $prodi->jurusan = $jurusan[$prodi->id_jurusan] ?? 'Tidak Diketahui';
        }

        return view('admin.prodi', compact('data_prodi'));
    }

    public function store(Request $request)
    {
        $data = [
            'kode_prodi' => $request->kode_prodi,
            'prodi' => $request->prodi,
            'id_jurusan' => $request->id_jurusan,
            'jenjang' => $request->jenjang
        ];

        DB::table('prodi')->insert($data);
        return redirect()->route('prodi.index')->with('success', 'Data Prodi berhasil ditambahkan.');
    }

    public function destroy(string $id)
    {
        DB::table('prodi')->where('id_prodi', $id)->delete();
        return redirect()->route('prodi.index')->with('success', 'Data Prodi berhasil dihapus.');
    }
}
