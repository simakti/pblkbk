@extends('layouts.backend.template')

@section('content')
<div class="container">
    <h1>Tambah Dosen KBK</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dosenkbk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_dosen" class="form-label">Nama Dosen</label>
            <select name="id_dosen" id="id_dosen" class="form-control">
                <option selected> --Pilih Dosen-- </option>
                @foreach($data_dosen as $dosen)
                    <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama_dosen }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_jenis_kbk" class="form-label">Jenis KBK</label>
            <select name="id_jenis_kbk" id="id_jenis_kbk" class="form-control">
                <option selected> --Pilih Jenis KBK-- </option>
                @foreach($data_jenis_kbk as $jenis_kbk)
                    <option value="{{ $jenis_kbk->id_jenis_kbk }}">{{ $jenis_kbk->jenis_kbk }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
