<?php

namespace App\Http\Controllers;

use App\Models\PengurusKBK;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportPengurusKBK;
use App\Imports\ImportPengurusKBK;
use Illuminate\Support\Facades\DB;

class PengurusKBKController extends Controller
{
    public function index()
    {
        try {
            $data_penguruskbk = DB::table('penguruskbk')
                ->join('jenis_kbk', 'penguruskbk.id_jenis_kbk', '=', 'jenis_kbk.id_jenis_kbk')
                ->join('dosen', 'penguruskbk.id_dosen', '=', 'dosen.id_dosen')
                ->join('jabatankbk', 'penguruskbk.id_jabatan_kbk', '=', 'jabatankbk.id_jabatan_kbk')
                ->select('penguruskbk.*', 'dosen.nama_dosen', 'jenis_kbk.jenis_kbk', 'jabatankbk.jabatan')
                ->orderBy('id_penguruskbk')
                ->get();
            return view('admin.penguruskbk', compact('data_penguruskbk'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function export()
    {
        return Excel::download(new ExportPengurusKBK, 'penguruskbk.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);

        Excel::import(new ImportPengurusKBK, $request->file('file'));

        return redirect()->route('penguruskbk.index')->with('success', 'Data imported successfully.');
    }

    public function create()
    {
        $data_dosen = DB::table('dosen')->get();
        $data_jenis_kbk = DB::table('jenis_kbk')->get();
        $data_jabatan_kbk = DB::table('jabatankbk')->get();

        return view('admin.form.form_penguruskbk', compact('data_dosen', 'data_jenis_kbk', 'data_jabatan_kbk'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_dosen' => 'required|integer|exists:dosen,id_dosen',
            'id_jenis_kbk' => 'required|integer|exists:jenis_kbk,id_jenis_kbk',
            'id_jabatan_kbk' => 'required|integer|exists:jabatankbk,id_jabatan_kbk',
            'status' => 'required|string|max:255',
        ]);

        DB::table('penguruskbk')->insert([
            'id_dosen' => $validatedData['id_dosen'],
            'id_jenis_kbk' => $validatedData['id_jenis_kbk'],
            'id_jabatan_kbk' => $validatedData['id_jabatan_kbk'],
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('penguruskbk.index')->with('success', 'Data Pengurus KBK berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data_dosen = DB::table('dosen')->get();
        $data_jenis_kbk = DB::table('jenis_kbk')->get();
        $data_jabatan_kbk = DB::table('jabatankbk')->get();

        $penguruskbk = PengurusKBK::where('id_penguruskbk', $id)->first();
        return view('admin.form.form_edit_penguruskbk', compact('data_dosen', 'data_jenis_kbk', 'data_jabatan_kbk', 'penguruskbk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_dosen' => 'required|exists:dosen,id_dosen',
            'id_jenis_kbk' => 'required|exists:jenis_kbk,id_jenis_kbk',
            'id_jabatan_kbk' => 'required|exists:jabatankbk,id_jabatan_kbk',
            'status' => 'required|string|max:255',
        ]);

        $data = [
            'id_dosen' => $request->id_dosen,
            'id_jenis_kbk' => $request->id_jenis_kbk,
            'id_jabatan_kbk' => $request->id_jabatan_kbk,
            'status' => $request->status,
        ];

        DB::table('penguruskbk')->where('id_penguruskbk', $id)->update($data);

        return redirect()->route('penguruskbk.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        DB::table('penguruskbk')->where('id_penguruskbk', $id)->delete();
        return redirect()->route('penguruskbk.index')->with('success', 'Data berhasil dihapus.');
    }
}
?>
