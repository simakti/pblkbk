@extends('layouts.admin.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title mb-4">Tambah Data KBK</h5>
                <div class="container-fluid">
                    <!-- Form Tambah Data -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0">Form Tambah Data</h6>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('datakbk.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="id_jenis_kbk" class="form-label">ID Jenis KBK</label>
                                    <input type="number" name="id_jenis_kbk" id="id_jenis_kbk" class="form-control"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kbk" class="form-label">Jenis KBK</label>
                                    <input type="text" name="jenis_kbk" id="jenis_kbk" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                                </div>
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('datakbk.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    @endsection
