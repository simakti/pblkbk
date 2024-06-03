@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title mb-4">Edit Data Verifikasi RPS</h5>
            <div class="container-fluid">
                <!-- Form Edit Data -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Form Edit Data</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('verif_rps.update', $verif_rps->id_verif_rps) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Repo RPS -->
                            <div class="mb-3">
                                <label for="id_repo_rps" class="form-label">Repo RPS</label>
                                <select name="id_repo_rps" id="id_repo_rps" class="form-control">
                                    <option selected> --Pilih Repo RPS-- </option>
                                    @foreach($data_repo_rps as $repo)
                                        <option value="{{ $repo->id_repo_rps }}" @if($verif_rps->id_repo_rps == $repo->id_repo_rps) selected @endif>{{ $repo->id_repo_rps }}</option>
                                    @endforeach
                                </select>
                                @error('id_repo_rps')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Nama Dosen -->
                            <div class="mb-3">
                                <label for="id_dosen" class="form-label">Nama Dosen Verifikator</label>
                                <select name="id_dosen" id="id_dosen" class="form-control">
                                    <option selected> --Pilih Dosen-- </option>
                                    @foreach($data_dosen as $dosen)
                                        <option value="{{ $dosen->id_dosen }}" @if($verif_rps->id_dosen == $dosen->id_dosen) selected @endif>{{ $dosen->nama_dosen }}</option>
                                    @endforeach
                                </select>
                                @error('id_dosen')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Status Verifikasi -->
                            <div class="mb-3">
                                <label for="status_verif_rps" class="form-label">Status Verifikasi</label>
                                <input type="text" class="form-control" id="status_verif_rps" name="status_verif_rps" value="{{ $verif_rps->status_verif_rps }}">
                                @error('status_verif_rps')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Catatan -->
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ $verif_rps->catatan }}</textarea>
                                @error('catatan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Tanggal Verifikasi -->
                            <div class="mb-3">
                                <label for="tanggal_diverifikasi" class="form-label">Tanggal Diverifikasi</label>
                                <input type="date" class="form-control" id="tanggal_diverifikasi" name="tanggal_diverifikasi" value="{{ $verif_rps->tanggal_diverifikasi }}">
                                @error('tanggal_diverifikasi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- File -->
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload File</label>
                                <input type="file" class="form-control" id="file" name="file">
                                @if($verif_rps->file)
                                    <p>File sebelumnya: <a href="{{ Storage::url($verif_rps->file) }}" target="_blank">Lihat File</a></p>
                                @endif
                                @error('file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('verif_rps.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
                <!-- End Form Edit Data -->
            </div>
        </div>
    </div>
</div>
@endsection
