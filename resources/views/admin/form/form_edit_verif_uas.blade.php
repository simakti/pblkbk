@extends('layouts.admin.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title mb-4">Edit Data Verifikasi Soal UAS</h5>
            <div class="container-fluid">
                <!-- Form Edit Data -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Form Edit Data</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('verif_uas.update', $verif_uas->id_verif_uas) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Repo UAS -->
                            <div class="mb-3">
                                <label for="id_repo_uas" class="form-label">Repo UAS</label>
                                <select name="id_repo_uas" id="id_repo_uas" class="form-control">
                                    <option selected> --Pilih Repo UAS-- </option>
                                    @foreach($data_repo_uas as $repo)
                                        <option value="{{ $repo->id_repo_uas }}" @if($verif_uas->id_repo_uas == $repo->id_repo_uas) selected @endif>{{ $repo->id_repo_uas }}</option>
                                    @endforeach
                                </select>
                                @error('id_repo_uas')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Catatan -->
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ $verif_uas->catatan }}</textarea>
                                @error('catatan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal Verifikasi -->
                            <div class="mb-3">
                                <label for="tanggal_diverifikasi" class="form-label">Tanggal Diverifikasi</label>
                                <input type="date" class="form-control" id="tanggal_diverifikasi" name="tanggal_diverifikasi" value="{{ $verif_uas->tanggal_diverifikasi }}">
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
                <!-- End Form Edit Data -->
            </div>
        </div>
    </div>
</div>
@endsection
