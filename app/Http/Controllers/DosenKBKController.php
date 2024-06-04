<?php

namespace App\Http\Controllers;

use App\Models\DosenKBK;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportDosenKBK;
use App\Imports\ImportDosenKBK;
use Illuminate\Support\Facades\DB;

class DosenKBKController extends Controller
{
    public function index()
    {
        try {
            $data_dosenkbk = DB::table('dosen_kbk')
                ->join('jenis_kbk', 'dosen_kbk.id_jenis_kbk', '=', 'jenis_kbk.id_jenis_kbk')
                ->join('dosen', 'dosen_kbk.id_dosen', '=', 'dosen.id_dosen')
                ->select('dosen_kbk.*', 'dosen.nama_dosen', 'jenis_kbk.jenis_kbk')
                ->orderBy('id_dosen_kbk')
                ->get();
            return view('backend.dosenkbk', compact('data_dosenkbk'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function export()
    {
        return Excel::download(new ExportDosenKBK, 'dosenkbk.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new ImportDosenKBK, $request->file('file'));

        return redirect()->route('dosenkbk.index')->with('success', 'Data imported successfully.');
    }

    public function create()
    {
        $data_dosen = DB::table('dosen')->get();
        $data_jenis_kbk = DB::table('jenis_kbk')->get();

        return view('backend.form.form_dosenkbk', compact('data_dosen', 'data_jenis_kbk'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_dosen' => 'required|integer|exists:dosen,id_dosen',
            'id_jenis_kbk' => 'required|integer|exists:jenis_kbk,id_jenis_kbk',
        ]);

        DB::table('dosen_kbk')->insert([
            'id_dosen' => $validatedData['id_dosen'],
            'id_jenis_kbk' => $validatedData['id_jenis_kbk'],
        ]);

        return redirect()->route('dosenkbk.index')->with('success', 'Data Dosen KBK berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data_dosen = DB::table('dosen')->get();
        $data_jenis_kbk = DB::table('jenis_kbk')->get();

        $dosenkbk = DosenKBK::where('id_dosen_kbk', $id)->first();
        return view('backend.form.form_edit_dosenkbk', compact('data_dosen', 'data_jenis_kbk', 'dosenkbk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_dosen' => 'required|exists:dosen,id_dosen',
            'id_jenis_kbk' => 'required|exists:jenis_kbk,id_jenis_kbk',
        ]);

        $data = [
            'id_dosen' => $request->id_dosen,
            'id_jenis_kbk' => $request->id_jenis_kbk,
        ];

        DB::table('dosen_kbk')->where('id_dosen_kbk', $id)->update($data);

        return redirect()->route('dosenkbk.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('dosen_kbk')->where('id_dosen_kbk', $id)->delete();
        return redirect()->route('dosenkbk.index')->with('success', 'Data berhasil dihapus.');
    }
}
?>
