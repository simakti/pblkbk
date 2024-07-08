@extends('layouts.admin.template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Edit Data Berita Acara</h5>
                <form action="{{ route('berita_acara.update', $berita_acara->id_berita_acara) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ $berita_acara->tanggal }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat" class="form-label">Tempat</label>
                        <input type="text" class="form-control" id="tempat" name="tempat"
                            value="{{ $berita_acara->tempat }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="acara" class="form-label">Acara</label>
                        <input type="text" class="form-control" id="acara" name="acara"
                            value="{{ $berita_acara->acara }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="file" class="form-control" id="file" name="file">
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah file</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
