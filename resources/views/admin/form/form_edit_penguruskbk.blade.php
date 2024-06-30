@extends('layouts.admin.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title mb-4">Edit Pengurus KBK</h5>
            <div class="container-fluid">
                <!-- Form Edit Data -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Form Edit Data</h6>
                    </div>
                <div class="card-body">

                <form action="{{ route('penguruskbk.update', $penguruskbk->id_penguruskbk) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Nama Dosen -->
                    <div class="mb-3">
                        <label for="id_dosen">Nama Dosen</label>
                        <select name="id_dosen" id="id_dosen" class="form-control">
                            @foreach($data_dosen as $dosen)
                                <option value="{{ $dosen->id_dosen }}" {{ $penguruskbk->id_dosen == $dosen->id_dosen ? 'selected' : '' }}>{{ $dosen->nama_dosen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Jenis KBK -->
                    <div class="mb-3">
                        <label for="id_jenis_kbk">Jenis KBK</label>
                        <select name="id_jenis_kbk" id="id_jenis_kbk" class="form-control">
                            @foreach($data_jenis_kbk as $jenis_kbk)
                                <option value="{{ $jenis_kbk->id_jenis_kbk }}" {{ $penguruskbk->id_jenis_kbk == $jenis_kbk->id_jenis_kbk ? 'selected' : '' }}>{{ $jenis_kbk->jenis_kbk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Jabatan KBK -->
                    <div class="mb-3">
                        <label for="id_jabatan_kbk">Jabatan KBK</label>
                        <select name="id_jabatan_kbk" id="id_jabatan_kbk" class="form-control">
                            @foreach($data_jabatan_kbk as $jabatan_kbk)
                                <option value="{{ $jabatan_kbk->id_jabatan_kbk }}" {{ $penguruskbk->id_jabatan_kbk == $jabatan_kbk->id_jabatan_kbk ? 'selected' : '' }}>{{ $jabatan_kbk->jabatan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ $penguruskbk->status == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ $penguruskbk->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('verif_rps.index') }}" class="btn btn-secondary">Batal</a>
                </form>

            </div>
            @endsection
