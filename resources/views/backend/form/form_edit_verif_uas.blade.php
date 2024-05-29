@extends('layouts.backend.template')

@section('content')
<div class="container">
    <h1>Edit Data Soal UAS</h1>

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
            <label for="id_verif_uas">ID Soal UAS</label>
            <input type="text" name="id_verif_uas" id="id_verif_uas" class="form-control" value="{{ $verif_uas->id_verif_uas }}" disabled>
        </div>
        <div class="form-group">
            <label for="id_dosen">Nama Dosen</label>
            <select name="id_dosen" id="id_dosen" class="form-control" required>
                <option selected> --Pilih Dosen-- </option>
                @foreach($data_dosen as $dosen)
                <option value="{{ $dosen->id_dosen }}" {{ $verif_uas->id_dosen == $dosen->id_dosen ? 'selected' : '' }}>{{ $dosen->nama_dosen }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_matakuliah">Matakuliah</label>
            <select name="id_matakuliah" id="id_matakuliah" class="form-control" required>
                <option selected> --Pilih Matakuliah-- </option>
                @foreach($data_matakuliah as $matakuliah)
                <option value="{{ $matakuliah->id_matakuliah }}" {{ $verif_uas->id_matakuliah == $matakuliah->id_matakuliah ? 'selected' : '' }}>{{ $matakuliah->nama_matakuliah }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_thnakd">Tahun Akademik</label>
            <select name="id_thnakd" id="id_thnakd" class="form-control" required>
                <option selected> --Pilih Tahun Akademik-- </option>
                @foreach($data_thnakd as $thnakd)
                <option value="{{ $thnakd->id_thnakd }}" {{ $verif_uas->id_thnakd == $thnakd->id_thnakd ? 'selected' : '' }}>{{ $thnakd->thn_akd }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status_verifikasi" value="verifikasi">
                <label class="form-check-label" for="status_verifikasi">
                    Verifikasi
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status_belum_verifikasi" value="belum verifikasi">
                <label class="form-check-label" for="status_belum_verifikasi">
                    Belum Verifikasi
                </label>
            </div>
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
