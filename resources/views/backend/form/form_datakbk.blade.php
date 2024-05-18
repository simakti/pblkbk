@extends('layouts.backend.template')

@section('content')
<div class="container">
    <h1>Tambah Jenis KBK</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('datakbk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_jenis_kbk" class="form-label">ID Jenis KBK</label>
            <input type="number" name="id_jenis_kbk" id="id_jenis_kbk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jenis_kbk" class="form-label">Jenis KBK</label>
            <input type="text" name="jenis_kbk" id="jenis_kbk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
