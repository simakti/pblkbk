@extends('layouts.admin.template')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h1>Tambah Berita Acara</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('berita_acara.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tempat" class="form-label">Tempat</label>
                <input type="text" name="tempat" id="tempat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="acara" class="form-label">Acara</label>
                <input type="text" name="acara" id="acara" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
