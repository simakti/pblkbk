@extends('layouts.admin.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title mb-4">Edit Matkul KBK</h5>
            <div class="container-fluid">
                <!-- Form Edit Data -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Form Edit Data</h6>
                    </div>
                <div class="card-body">

                <form action="{{ route('matkul_kbk.update', $matkul_kbk->id_matkul_kbk) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Matakuliah -->
                    <div class="mb-3">
                        <label for="id_matakuliah">Nama Matakuliah</label>
                        <select name="id_matakuliah" id="id_matakuliah" class="form-control">
                            @foreach($data_matakuliah as $matakuliah)
                                <option value="{{ $matakuliah->id_matakuliah }}" {{ $matkul_kbk->id_matakuliah == $matakuliah->nama_matakuliah ? 'selected' : '' }}>{{ $matakuliah->nama_matakuliah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Jenis KBK -->
                    <div class="mb-3">
                        <label for="id_jenis_kbk">Jenis KBK</label>
                        <select name="id_jenis_kbk" id="id_jenis_kbk" class="form-control">
                            @foreach($data_jenis_kbk as $jenis_kbk)
                                <option value="{{ $jenis_kbk->id_jenis_kbk }}" {{ $matkul_kbk->id_jenis_kbk == $jenis_kbk->id_jenis_kbk ? 'selected' : '' }}>{{ $jenis_kbk->jenis_kbk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Kurikulum -->
                    <div class="mb-3">
                        <label for="id_kurikulum">Nama Kurikulum</label>
                        <select name="id_kurikulum" id="id_kurikulum" class="form-control">
                            @foreach($data_kurikulum as $kurikulum)
                                <option value="{{ $kurikulum->id_kurikulum }}" {{ $matkul_kbk->id_kurikulum == $kurikulum->nama_kurikulum ? 'selected' : '' }}>{{ $kurikulum->nama_kurikulum }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('verif_rps.index') }}" class="btn btn-secondary">Batal</a>
                </form>

            </div>
            @endsection
