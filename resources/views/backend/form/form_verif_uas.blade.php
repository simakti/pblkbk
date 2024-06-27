@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title mb-4">Tambah Data Verifikasi Soal UAS</h5>
            <div class="container-fluid">
                <!-- Form Tambah Data -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Form Tambah Data</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('verif_uas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Repo RPS -->
                            <div class="mb-3">
                                <label for="id_repo_uas" class="form-label">Repo RPS</label>
                                <select name="id_repo_uas" id="id_repo_uas" class="form-control">
                                    <option selected> --Pilih Repo RPS-- </option>
                                    @foreach($data_repo_uas as $repo)
                                        <option value="{{ $repo->id_repo_uas }}">{{ $repo->id_repo_uas }}</option>
                                    @endforeach
                                </select>
                                @error('id_repo_uas')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Nama Dosen -->
                            <div class="mb-3">
                                <label for="id_dosen" class="form-label">Nama Dosen Verifikator</label>
                                <select name="id_dosen" id="id_dosen" class="form-control">
                                    <option selected> --Pilih Dosen-- </option>
                                    @foreach($data_dosen as $dosen)
                                        <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama_dosen }}</option>
                                    @endforeach
                                </select>
                                @error('id_dosen')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status_verif_uas" class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_verif_uas" id="status_verif_uas" value="verifikasi">
                                    <label class="form-check-label" for="status_verif_uas">
                                        Verifikasi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_verif_uas" id="status_belum_verifikasi" value="belum verifikasi">
                                    <label class="form-check-label" for="status_belum_verifikasi">
                                        Belum Verifikasi
                                    </label>
                                </div>
                                @error('status_verif_uas')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Catatan -->
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                                @error('catatan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Tanggal Verifikasi -->
                            <div class="mb-3">
                                <label for="tanggal_diverifikasi" class="form-label">Tanggal Diverifikasi</label>
                                <input type="date" class="form-control" id="tanggal_diverifikasi" name="tanggal_diverifikasi">
                                @error('tanggal_diverifikasi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('verif_uas.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
                <!-- End Form Tambah Data -->
            </div>
        </div>
    </div>
</div>
@endsection
