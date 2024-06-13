@extends('layouts.admin.template')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h1>Tambah Matkul KBK</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('matkul_kbk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_matakuliah" class="form-label">Nama Matakuliah</label>
            <select name="id_matakuliah" id="id_matakuliah" class="form-control">
                @foreach($data_matakuliah as $matakuliah)
                    <option value="{{ $matakuliah->id_matakuliah }}">{{ $matakuliah->nama_matakuliah }}</option>
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
            <label for="id_kurikulum" class="form-label">Nama kurikulum</label>
            <select name="id_kurikulum" id="id_kurikulum" class="form-control">
                @foreach($data_kurikulum as $kurikulum)
                    <option value="{{ $kurikulum->id_kurikulum }}">{{ $kurikulum->nama_kurikulum}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
