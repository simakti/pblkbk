@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title mb-4">Tambah Data Verifikasi RPS</h5>
            <div class="container-fluid">
                <!-- Form Tambah Data -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Form Tambah Data</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('verif_rps.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Repo RPS -->
                            <div class="mb-3">
                                <label for="id_repo_rps" class="form-label">Repo RPS</label>
                                <select name="id_repo_rps" id="id_repo_rps" class="form-control">
                                    <option selected> --Pilih Repo RPS-- </option>
                                    @foreach($data_repo_rps as $repo)
                                        <option value="{{ $repo->id_repo_rps }}">{{ $repo->id_repo_rps }}</option>
                                    @endforeach
                                </select>
                                @error('id_repo_rps')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
<<<<<<< HEAD
                            <!-- Nama Pengurus KBK -->
                            <div class="mb-3">
                                <label for="id_penguruskbk" class="form-label">Dosen Verifikasi</label>
                                <select name="id_penguruskbk" id="id_penguruskbk" class="form-control">
                                    <option selected> --Pilih Dosen-- </option>
                                    @foreach($data_penguruskbk as $penguruskbk)
                                        <option value="{{ $penguruskbk->id_penguruskbk }}">{{ $penguruskbk->nama_dosen }}</option>
                                    @endforeach
                                </select>
                                @error('id_penguruskbk')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status_verif_rps" class="form-label">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_verif_rps" id="status_verif_rps" value="1">
                                    <label class="form-check-label" for="status_verif_rps">
                                        Verifikasi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status_verif_rps" id="status_belum_verifikasi" value="0">
                                    <label class="form-check-label" for="status_belum_verifikasi">
                                        Belum Verifikasi
                                    </label>
                                </div>
                                @error('status_verif_rps')
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
                            <a href="{{ route('verif_rps.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
                <!-- End Form Tambah Data -->
            </div>
        </div>
    </div>
</div>
@endsection
