@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title  mb-4">Tambah Data RPS</h5>
            <div class="container-fluid">
                <!-- Form Tambah Data -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Form Tambah Data</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('repo_rps.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="id_repo_rps" class="form-label">ID RPS</label>
                                <input type="text" name="id_repo_rps" id="id_repo_rps" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="id_dosen" class="form-label">Nama Dosen</label>
                                <select name="id_dosen" id="id_dosen" class="form-control">
                                    @foreach($data_dosen as $dosen)
                                    <option value="{{ $dosen->id_dosen }}">{{ $dosen->nama_dosen }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_matakuliah" class="form-label">Matakuliah</label>
                                <select name="id_matakuliah" id="id_matakuliah" class="form-control">
                                    @foreach($data_matakuliah as $matakuliah)
                                    <option value="{{ $matakuliah->id_matakuliah }}">{{ $matakuliah->kode_matakuliah }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_thnakd" class="form-label">Tahun Angkatan</label>
                                <select name="id_thnakd" id="id_thnakd" class="form-control">
                                    @foreach($data_thnakd as $thnakd)
                                    <option value="{{ $thnakd->id_thnakd }}">{{ $thnakd->thn_akd }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">File</label>
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_verif" class="form-label">Tanggal Verifikasi</label>
                                <input type="date" name="tanggal_verif" id="tanggal_verif" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection