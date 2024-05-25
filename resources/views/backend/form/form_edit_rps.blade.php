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

    <form action="{{ route('rps.update', $rps->id_verif_rps) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_dosen">Nama Dosen</label>
            <select name="id_dosen" id="id_dosen" class="form-control" required>
                @foreach($data_dosen as $dosen)
                <option value="{{ $dosen->id_dosen }}" {{ $rps->id_dosen == $dosen->id_dosen ? 'selected' : '' }}>{{ $dosen->nama_dosen }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_verif_rps" class="form-label">ID RPS</label>
            <input type="text" name="id_verif_rps" id="id_verif_rps" class="form-control" value="{{ $rps->id_verif_rps }}" required>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <input type="file" name="file" id="file" class="form-control">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="diverifikasi" {{ $rps->status == 'diverifikasi' ? 'selected' : '' }}>Diverifikasi</option>
                <option value="tidak diverifikasi" {{ $rps->status == 'tidak diverifikasi' ? 'selected' : '' }}>Tidak Diverifikasi</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea name="catatan" id="catatan" class="form-control">{{ $rps->catatan }}</textarea>
        </div>
        <div class="mb-3">
            <label for="tanggal_verif" class="form-label">Tanggal Verif</label>
            <input type="date" name="tanggal_verif" id="tanggal_verif" class="form-control" value="{{ $rps->tanggal_verif }}" required>
        </div>
        <button type="submit" class="btn btn-warning btn-sm">Update</button>
    </form>
</div>
@endsection