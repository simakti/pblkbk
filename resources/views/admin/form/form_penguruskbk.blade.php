@extends('layouts.admin.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title mb-4">Tambah Dosen KBK</h5>
            <div class="container-fluid">
                <!-- Form Tambah Data -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Form Tambah Data</h6>
                    </div>
                <div class="card-body">

                <form action="{{ route('penguruskbk.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id_dosen" class="form-label">Nama Dosen</label>
                        <select name="id_dosen" id="id_dosen" class="form-control">
                            @foreach($data_dosen as $dosen)
                                <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama_dosen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_jenis_kbk" class="form-label">Jenis KBK</label>
                        <select name="id_jenis_kbk" id="id_jenis_kbk" class="form-control">
                            @foreach($data_jenis_kbk as $jenis_kbk)
                                <option value="{{ $jenis_kbk->id_jenis_kbk }}">{{ $jenis_kbk->jenis_kbk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_jabatan_kbk" class="form-label">Jabatan KBK</label>
                        <select name="id_jabatan_kbk" id="id_jabatan_kbk" class="form-control">
                            @foreach($data_jabatan_kbk as $jabatan_kbk)
                                <option value="{{ $jabatan_kbk->id_jabatan_kbk }}">{{ $jabatan_kbk->jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('penguruskbk.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
            @endsection
