@extends('layouts.admin.template')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h1>Edit Jenis KBK</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('datakbk.update', $jenis_kbk->id_jenis_kbk) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_jenis_kbk" class="form-label">ID Jenis KBK</label>
            <input type="number" name="id_jenis_kbk" id="id_jenis_kbk" class="form-control" value="{{ $jenis_kbk->id_jenis_kbk }}" required>
        </div>
        <div class="mb-3">
            <label for="jenis_kbk" class="form-label">Jenis KBK</label>
            <input type="text" name="jenis_kbk" id="jenis_kbk" class="form-control" value="{{ $jenis_kbk->jenis_kbk }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $jenis_kbk->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning btn-sm">Update</button>
    </form>
</div>
@endsection
