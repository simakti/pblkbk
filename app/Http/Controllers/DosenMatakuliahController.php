<?php

namespace App\Http\Controllers;

use App\Models\DosenMatakuliah;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\Kelas;
use App\Models\Thnakd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenMatakuliahController extends Controller
{
    public function index()
    {
        try {
            $data_dosenmatakuliah = DB::table('dosen_matakuliah')
                ->join('dosen', 'dosen_matakuliah.id_dosen', '=', 'dosen.id_dosen')
                ->join('matakuliah', 'dosen_matakuliah.id_matakuliah', '=', 'matakuliah.id_matakuliah')
                ->join('kelas', 'dosen_matakuliah.id_kelas', '=', 'kelas.id_kelas')
                ->join('thnakd', 'dosen_matakuliah.id_thnakd', '=', 'thnakd.id_thnakd')
                ->select('dosen_matakuliah.*', 'dosen.nama_dosen as nama_dosen', 'matakuliah.nama_matakuliah as nama_matakuliah', 'kelas.nama_kelas as nama_kelas', 'thnakd.thn_akd as tahun_akademik')
                ->orderBy('dosen_matakuliah.id_dosen_matakuliah')
                ->get();
            return view('admin.dosenmatakuliah', compact('data_dosenmatakuliah'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.form.form_dosenmatakuliah', compact('data_dosen', 'data_matakuliah', 'data_kelas', 'data_thnakd'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_dosen' => 'required|integer|exists:dosen,id_dosen',
            'id_matakuliah' => 'required|integer|exists:matakuliah,id_matakuliah',
            'id_kelas' => 'required|integer|exists:kelas,id_kelas',
            'id_thnakd' => 'required|integer|exists:thnakd,id_thnakd',
        ]);

        DB::table('dosen_matakuliah')->insert([
            'id_dosen' => $validatedData['id_dosen'],
            'id_matakuliah' => $validatedData['id_matakuliah'],
            'id_kelas' => $validatedData['id_kelas'],
            'id_thnakd' => $validatedData['id_thnakd'],
        ]);

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_dosen' => 'required|exists:dosen,id_dosen',
            'id_matakuliah' => 'required|exists:matakuliah,id_matakuliah',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'id_thnakd' => 'required|exists:thnakd,id_thnakd',
        ]);

        $data = [
            'id_dosen' => $request->id_dosen,
            'id_matakuliah' => $request->id_matakuliah,
            'id_kelas' => $request->id_kelas,
            'id_thnakd' => $request->id_thnakd,
        ];

        DB::table('dosen_matakuliah')->where('id_dosen_matakuliah', $id)->update($data);

        return redirect()->route('dosenmatakuliah.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {

    }
}
