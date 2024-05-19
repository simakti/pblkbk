<?php

namespace App\Http\Controllers;

use App\Models\PengurusKBK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengurusKBKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_penguruskbk = DB::table('penguruskbk')
            ->join('jenis_kbk', 'penguruskbk.id_jenis_kbk', '=', 'jenis_kbk.id_jenis_kbk')
            ->join('dosen', 'penguruskbk.id_dosen', '=', 'dosen.id_dosen')
            ->join('jabatankbk', 'penguruskbk.id_jabatan_kbk', '=', 'jabatankbk.id_jabatan_kbk')
            ->select('penguruskbk.*', 'dosen.nama_dosen', 'jenis_kbk.jenis_kbk', 'jabatankbk.jabatan')
            ->orderBy('id_penguruskbk')
            ->get();
        return view('backend.penguruskbk', compact('data_penguruskbk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_dosen = DB::table('dosen')->get(); // Mengambil data dosen
        $data_jenis_kbk = DB::table('jenis_kbk')->get(); // Mengambil data jenis KBK
        $data_jabatan_kbk = DB::table('jabatankbk')->get(); // Mengambil data jabatan KBK

        return view('backend.form.form_penguruskbk', compact('data_dosen', 'data_jenis_kbk', 'data_jabatan_kbk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'id_dosen' => 'required|integer|exists:dosen,id_dosen',
            'id_jenis_kbk' => 'required|integer|exists:jenis_kbk,id_jenis_kbk',
            'id_jabatan_kbk' => 'required|integer|exists:jabatankbk,id_jabatan_kbk',
            'status' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        DB::table('penguruskbk')->insert([
            'id_dosen' => $validatedData['id_dosen'],
            'id_jenis_kbk' => $validatedData['id_jenis_kbk'],
            'id_jabatan_kbk' => $validatedData['id_jabatan_kbk'],
            'status' => $validatedData['status'],
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('penguruskbk.index')->with('success', 'Data Pengurus KBK berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data_dosen = DB::table('dosen')->get();
        $data_jenis_kbk = DB::table('jenis_kbk')->get();
        $data_jabatan_kbk = DB::table('jabatankbk')->get();

        $penguruskbk = PengurusKBK::where('id_penguruskbk', $id)->first();
        return view('backend.form.form_edit_penguruskbk', compact('data_dosen', 'data_jenis_kbk', 'data_jabatan_kbk', 'penguruskbk'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('penguruskbk')->where('id_penguruskbk', $id)->delete();
        return redirect()->route('penguruskbk.index')->with('success', 'Data berhasil dihapus.');
    }
}

?>

