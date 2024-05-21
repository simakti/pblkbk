<?php

namespace App\Http\Controllers;


use App\Models\JenisKbk;
use App\Models\Kurikulum;
use App\Models\Matakuliah;
use App\Models\matkulkbk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportMatkulKBK;
use App\Imports\ImportMatkulKBK;

class MatkulkbkController extends Controller
{
    public function index()
    {
        $data_matkul_kbk = DB::table('matkul_kbk')
            ->join('matakuliah', 'matkul_kbk.id_matakuliah', '=', 'matakuliah.id_matakuliah')
            ->join('jenis_kbk', 'matkul_kbk.id_jenis_kbk', '=', 'jenis_kbk.id_jenis_kbk')
            ->join('kurikulum', 'matkul_kbk.id_kurikulum', '=', 'kurikulum.id_kurikulum')
            ->select('matkul_kbk.*', 'matakuliah.nama_matakuliah', 'jenis_kbk.jenis_kbk', 'kurikulum.nama_kurikulum')
            ->orderBy('id_matkul_kbk')
            ->get();

        return view('backend.matkul_kbk', compact('data_matkul_kbk'));
    }

    public function export()
    {
        return Excel::download(new ExportMatkulKBK, 'matkul_kbk.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new ImportMatkulKBK, $request->file('file'));

        return redirect()->route('matkul_kbk.index')->with('success', 'Data imported successfully.');
    }
    public function create()
    {
        $data_matakuliah = DB::table('matakuliah')->get(); // Mengambil data matakuliah
        $data_jenis_kbk = DB::table('jenis_kbk')->get(); // Mengambil data jenis KBK
        $data_kurikulum = DB::table('kurikulum')->get(); // Mengambil data kurikulum

        return view('backend.form.form_matkul_kbk', compact('data_matakuliah', 'data_jenis_kbk', 'data_kurikulum'));
    }

    public function store(Request $request)
    {
        // Validasi data input
        $validateData = $request->validate([
            'id_matakuliah' => 'required|exists:matakuliah,id_matakuliah',
            'id_jenis_kbk' => 'required|exists:jenis_kbk,id_jenis_kbk',
            'id_kurikulum' => 'required|exists:kurikulum,id_kurikulum',

        ]);

        // Simpan data ke database
        DB::table('matkul_kbk')->insert([
            'id_matakuliah' => $validateData['id_matakuliah'],
            'id_jenis_kbk' => $validateData['id_jenis_kbk'],
            'id_kurikulum' => $validateData['id_kurikulum'],
        ]);

        return redirect()->route('matkul_kbk.index')->with('success', 'Data Matkul KBK berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data_matakuliah= DB::table('matakuliah')->get();
        $data_jenis_kbk = DB::table('jenis_kbk')->get();
        $data_kurikulum = DB::table('kurikulum')->get();

        $matkul_kbk =matkulkbk::where('id_matkul_kbk', $id)->first();
        return view('backend.form.form_edit_matkul_kbk', compact('data_matakuliah', 'data_jenis_kbk', 'data_kurikulum', 'matkul_kbk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_matakuliah' => 'required|exists:matakuliah,id_matakuliah',
            'id_jenis_kbk' => 'required|exists:jenis_kbk,id_jenis_kbk',
            'id_kurikulum' => 'required|exists:kurikulum,id_kurikulum',
        ]);

        $data = [
            'id_matakuliah' => $request->id_matakuliah,
            'id_jenis_kbk' => $request->id_jenis_kbk,
            'id_kurikulum' => $request->id_kurikulum,
        ];

        DB::table('matkul_kbk')->where('id_matkul_kbk', $id)->update($data);

        return redirect()->route('matkul_kbk.index')->with('success', 'Data berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('matkul_kbk')->where('id_matkul_kbk', $id)->delete();
        return redirect()->route('matkul_kbk.index')->with('success', 'Data berhasil dihapus.');
    }
}

?>
