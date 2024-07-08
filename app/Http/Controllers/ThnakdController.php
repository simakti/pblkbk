<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ThnakdController extends Controller
{
    public function index()
    {
        // $data_thnakd = DB::table('thnakd')
        //     ->orderBy('id_thnakd')
        //     ->get();
        $api_url = "https://umkm-pnp.com/heni/index.php?folder=jurusan&file=thn_ta";
        $response = Http::get($api_url);
        $data_thnakd = $response->object()->list;
        return view('admin.thnakd', compact('data_thnakd'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'smt_thn_akd' => $request->smt_thn_akd,
            'status' => $request->status

        ];

        DB::table('thnakd')->insert($data);
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
