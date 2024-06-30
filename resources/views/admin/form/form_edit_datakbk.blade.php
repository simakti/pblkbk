@extends('layouts.admin.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title mb-4">Edit Data KBK</h5>
            <div class="container-fluid">
                <!-- Form Edit Data -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Form Edit Data</h6>
                    </div>
                <div class="card-body">

                <form action="{{ route('datakbk.update', $jenis_kbk->id_jenis_kbk) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Id -->
                    <div class="mb-3">
                        <label for="id_jenis_kbk" class="form-label">ID Jenis KBK</label>
                        <input type="number" name="id_jenis_kbk" id="id_jenis_kbk" class="form-control" value="{{ $jenis_kbk->id_jenis_kbk }}" required>
                    </div>
                    <!-- Jenis KBK -->
                    <div class="mb-3">
                        <label for="jenis_kbk" class="form-label">Jenis KBK</label>
                        <input type="text" name="jenis_kbk" id="jenis_kbk" class="form-control" value="{{ $jenis_kbk->jenis_kbk }}" required>
                    </div>
                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $jenis_kbk->deskripsi }}</textarea>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('verif_rps.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
            @endsection
