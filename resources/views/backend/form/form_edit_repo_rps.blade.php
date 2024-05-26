@extends('layouts.backend.template')

@section('content')
<div class="container">
    <h1>Edit Data RPS</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('repo_rps.update', $repo_rps->id_repo_rps) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_repo_rps">ID RPS</label>
            <input type="text" name="id_repo_rps" id="id_repo_rps" class="form-control" value="{{ $repo_rps->id_repo_rps }}" required>
        </div>
        <div class="form-group">
            <label for="id_dosen">Nama Dosen</label>
            <select name="id_dosen" id="id_dosen" class="form-control" required>
                @foreach($data_dosen as $dosen)
                <option value="{{ $dosen->id_dosen }}" {{ $repo_rps->id_dosen == $dosen->id_dosen ? 'selected' : '' }}>{{ $dosen->nama_dosen }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_matakuliah">Kode Matakuliah</label>
            <select name="id_matakuliah" id="id_matakuliah" class="form-control" required>
                @foreach($data_matakuliah as $matakuliah)
                <option value="{{ $matakuliah->id_matakuliah }}" {{ $repo_rps->id_matakuliah == $matakuliah->id_matakuliah ? 'selected' : '' }}>{{ $matakuliah->kode_matakuliah }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_thnakd">Tahun Angkatan</label>
            <select name="id_thnakd" id="id_thnakd" class="form-control" required>
                @foreach($data_thnakd as $thnakd)
                <option value="{{ $thnakd->id_thnakd }}" {{ $repo_rps->id_thnakd == $thnakd->id_thnakd ? 'selected' : '' }}>{{ $thnakd->thn_akd }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <div class="form-group">
            <label for="tanggal_verif">Tanggal Verif</label>
            <input type="date" name="tanggal_verif" id="tanggal_verif" class="form-control" value="{{ $repo_rps->tanggal_verif }}" required>
        </div>
        <button type="submit" class="btn btn-warning btn-sm">Update</button>
    </form>
</div>
@endsection