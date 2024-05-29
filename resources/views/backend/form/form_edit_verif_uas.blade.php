@extends('layouts.backend.template')

@section('content')
<div class="container">
    <h1>Edit Data UAS</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('verif_uas.update', $verif_uas->id_verif_uas) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_verif_rps">ID UAS</label>
            <input type="text" name="id_verif_uas" id="id_verif_uas" class="form-control" value="{{ $verif_uas->id_verif_uas }}" required>
        </div>
        <div class="form-group">
            <label for="id_dosen">Nama Dosen</label>
            <select name="id_dosen" id="id_dosen" class="form-control" required>
                @foreach($data_dosen as $dosen)
                <option value="{{ $dosen->id_dosen }}" {{ $verif_uas->id_dosen == $dosen->id_dosen ? 'selected' : '' }}>{{ $dosen->nama_dosen }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_matakuliah">Kode Matakuliah</label>
            <select name="id_matakuliah" id="id_matakuliah" class="form-control" required>
                @foreach($data_matakuliah as $matakuliah)
                <option value="{{ $matakuliah->id_matakuliah }}" {{ $verif_uas->id_matakuliah == $matakuliah->id_matakuliah ? 'selected' : '' }}>{{ $matakuliah->kode_matakuliah }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_thnakd">Tahun Akademik</label>
            <select name="id_thnakd" id="id_thnakd" class="form-control" required>
                @foreach($data_thnakd as $thnakd)
                <option value="{{ $thnakd->id_thnakd }}" {{ $verif_uas->id_thnakd == $thnakd->id_thnakd ? 'selected' : '' }}>{{ $thnakd->thn_akd }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="Verified" {{ $verif_uas->status === 'Verified' ? 'selected' : '' }}>Verified</option>
                <option value="Not Verified" {{ $verif_uas->status === 'Not Verified' ? 'selected' : '' }}>Not Verified</option>
            </select>
        </div>

        <div class="form-group">
            <label for="catatan">Catatan</label>
            <textarea name="catatan" id="catatan" class="form-control">{{ $verif_uas->catatan }}</textarea>
        </div>
        <div class="form-group">
            <label for="tanggal_verif">Tanggal Verif</label>
            <input type="date" name="tanggal_verif" id="tanggal_verif" class="form-control" value="{{ $verif_uas->tanggal_verif }}" required>
        </div>
        <button type="submit" class="btn btn-warning btn-sm">Update</button>
    </form>
</div>
@endsection