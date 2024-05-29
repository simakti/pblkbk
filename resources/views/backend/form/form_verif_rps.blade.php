@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title mb-4">Tambah Data RPS</h5>
            <div class="container-fluid">
                <!-- Form Tambah Data -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Form Tambah Data</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('verif_rps.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Nama Dosen -->
                            <div class="mb-3">
                                <label for="id_dosen" class="form-label">Nama Dosen</label>
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

                            <!-- Matakuliah -->
                            <div class="mb-3">
                                <label for="id_matakuliah" class="form-label">Matakuliah</label>
                                <select name="id_matakuliah" id="id_matakuliah" class="form-control">
                                    <option selected> --Pilih Matakuliah-- </option>
                                    @foreach($data_matakuliah as $matakuliah)
                                        <option value="{{ $matakuliah->id_matakuliah }}">{{ $matakuliah->nama_matakuliah }}</option>
                                    @endforeach
                                </select>
                                @error('id_matakuliah')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tahun Akademik -->
                            <div class="mb-3">
                                <label for="id_thnakd" class="form-label">Tahun Akademik</label>
                                <select name="id_thnakd" id="id_thnakd" class="form-control">
                                    <option selected> --Pilih Tahun Akademik-- </option>
                                    @foreach($data_thnakd as $thnakd)
                                        <option value="{{ $thnakd->id_thnakd }}">{{ $thnakd->thn_akd }}</option>
                                    @endforeach
                                </select>
                                @error('id_thnakd')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- File -->
                            <div class="mb-3">
                                <label for="file" class="form-label">File</label>
                                <input type="file" name="file" id="file" class="form-control">
                                @error('file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status -->
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
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Catatan -->
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea name="catatan" id="catatan" class="form-control"></textarea>
                                @error('catatan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal Verifikasi -->
                            <div class="mb-3">
                                <label for="tanggal_verif" class="form-label">Tanggal Verifikasi</label>
                                <input type="date" name="tanggal_verif" id="tanggal_verif" class="form-control">
                                @error('tanggal_verif')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
