@extends('layouts.admin.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title mb-4">Edit Data RPS</h5>
                <div class="container-fluid">
                    <!-- Form Edit Data -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0">Form Edit Data</h6>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('repo_rps.update', $repo_rps->id_repo_rps) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!-- Tahun Akademik -->
                                <div class="mb-3">
                                    <label for="id_thnakd">Tahun Akademik</label>
                                    <select name="id_thnakd" id="id_thnakd" class="form-control" required>
                                        <option selected> --Pilih Tahun Akademik-- </option>
                                        @foreach ($data_thnakd as $thnakd)
                                            <option value="{{ $thnakd->id_thnakd }}"
                                                {{ $repo_rps->id_thnakd == $thnakd->id_thnakd ? 'selected' : '' }}>
                                                {{ $thnakd->thn_akd }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Dosen -->
                                <div class="mb-3">
                                    <label for="id_dosen">Nama Dosen</label>
                                    <select name="id_dosen" id="id_dosen" class="form-control" required>
                                        <option selected> --Pilih Dosen-- </option>
                                        @foreach ($data_dosen as $dosen)
                                            <option value="{{ $dosen->id_dosen }}"
                                                {{ $repo_rps->id_dosen == $dosen->id_dosen ? 'selected' : '' }}>
                                                {{ $dosen->nama_dosen }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Matakuliah -->
                                <div class="mb-3">
                                    <label for="id_matakuliah">Matakuliah</label>
                                    <select name="id_matakuliah" id="id_matakuliah" class="form-control" required>
                                        <option selected> --Pilih Matakuliah-- </option>
                                        @foreach ($data_matakuliah as $matakuliah)
                                            <option value="{{ $matakuliah->id_matakuliah }}"
                                                {{ $repo_rps->id_matakuliah == $matakuliah->id_matakuliah ? 'selected' : '' }}>
                                                {{ $matakuliah->nama_matakuliah }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- File -->
                                <div class="mb-3">
                                    <label for="file">File</label>
                                    <input type="file" name="file" id="file" class="form-control">
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('repo_rps.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    @endsection
