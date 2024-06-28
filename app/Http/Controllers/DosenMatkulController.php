<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportDosenMatkul;


class DosenMatkulController extends Controller
{
    public function index()
    {

        $api_url = "https://umkm-pnp.com/heni/index.php?folder=dosen&file=matakuliah";
        $response = Http::get($api_url);
        $data_dosenmatkul = $response->object()->list;
        return view('backend.dosen_matkul', compact('data_dosenmatkul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function export()
    {
        return Excel::download(new ExportDosenMatkul, 'dosen_matkul.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'id_dosen'=>$request->id_dosen,
            'id_matakuliah'=>$request->id_matakuliah,
            'id_kelas'=>$request->id_kelas,
            'id_thnakd'=>$request->id_thnakd

        ];

        DB::table('dosen_matakuliah')->insert($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


