<?php

namespace App\Http\Controllers;

use App\Exports\ExportDataKBK;
use App\Imports\ImportDataKBK;
use App\Models\JenisKBK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DataKbkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_datakbk = DB::table('jenis_kbk')
            ->select('jenis_kbk.*')
            ->orderBy('id_jenis_kbk')
            ->get();
        return view('backend.datakbk', compact('data_datakbk'));
    }

    /**
     * Export the data to an Excel file.
     */
    public function export()
    {
        return Excel::download(new ExportDataKBK, 'datakbk.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new ImportDataKBK, $request->file('file'));

        return redirect()->route('datakbk.index')->with('success', 'Data imported successfully.');
    }






    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.form.form_datakbk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'id_jenis_kbk' => 'required|integer|unique:jenis_kbk,id_jenis_kbk',
            'jenis_kbk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan data ke database
        DB::table('jenis_kbk')->insert([
            'id_jenis_kbk' => $validatedData['id_jenis_kbk'],
            'jenis_kbk' => $validatedData['jenis_kbk'],
            'deskripsi' => $validatedData['deskripsi'],
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('datakbk.index')->with('success', 'Data Jenis KBK berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenis_kbk = JenisKBK::where('id_jenis_kbk', $id)->first();
        return view('backend.form.form_edit_datakbk', compact('jenis_kbk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_jenis_kbk' => 'required|exists:jenis_kbk,id_jenis_kbk',
            'jenis_kbk' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $data = [
            'id_jenis_kbk' => $request->id_jenis_kbk,
            'jenis_kbk' => $request->jenis_kbk,
            'deskripsi' => $request->deskripsi,
        ];

        DB::table('jenis_kbk')->where('id_jenis_kbk', $id)->update($data);

        return redirect()->route('datakbk.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('jenis_kbk')->where('id_jenis_kbk', $id)->delete();
        return redirect()->route('datakbk.index')->with('success', 'Data berhasil dihapus.');
    }

}
?>
