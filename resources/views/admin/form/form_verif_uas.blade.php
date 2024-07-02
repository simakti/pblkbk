@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
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
                            <!-- Repo Soal UAS -->
                            <div class="mb-3">
                                <label for="id_repo_uas" class="form-label">Repo Soal UAS</label>
                                <select name="id_repo_uas" id="id_repo_uas" class="form-control">
                                    <option selected> --Pilih Repo Soal UAS-- </option>
                                    @foreach($data_repo_uas as $repo)
                                        <option value="{{ $repo->id_repo_uas }}">{{ $repo->id_repo_uas }}</option>
                                    @endforeach
                                </select>
                                @error('id_repo_uas')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- Status -->
                            <input type="hidden" name="status_verif_rps" value="Diverifikasi">

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
