@extends('layouts.backend.template')

@section('content')
<div class="container">
    <h1>Edit Matkul KBK</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('matkul_kbk.update', $matkul_kbk->id_matkul_kbk) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_matakuliah">Nama Matakuliah</label>
            <select name="id_matakuliah" id="id_matakuliah" class="form-control">
                <option selected> --Pilih Matakuliah-- </option>
                @foreach($data_matakuliah as $matakuliah)
                    <option value="{{ $matakuliah->id_matakuliah }}" {{ $matkul_kbk->id_matakuliah == $matakuliah->nama_matakuliah ? 'selected' : '' }}>{{ $matakuliah->nama_matakuliah }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_jenis_kbk">Jenis KBK</label>
            <select name="id_jenis_kbk" id="id_jenis_kbk" class="form-control">
                <option selected> --Pilih Jenis KBK-- </option>
                @foreach($data_jenis_kbk as $jenis_kbk)
                    <option value="{{ $jenis_kbk->id_jenis_kbk }}" {{ $matkul_kbk->id_jenis_kbk == $jenis_kbk->id_jenis_kbk ? 'selected' : '' }}>{{ $jenis_kbk->jenis_kbk }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_kurikulum">Nama Kurikulum</label>
            <select name="id_kurikulum" id="id_kurikulum" class="form-control">
                <option selected> --Pilih Kurikulum-- </option>
                @foreach($data_kurikulum as $kurikulum)
                    <option value="{{ $kurikulum->id_kurikulum }}" {{ $matkul_kbk->id_kurikulum == $kurikulum->nama_kurikulum ? 'selected' : '' }}>{{ $kurikulum->nama_kurikulum }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning btn-sm">Update</button>
    </form>

</div>
@endsection
