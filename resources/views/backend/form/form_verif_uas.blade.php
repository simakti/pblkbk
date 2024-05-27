@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title  mb-4">Tambah Data UAS</h5>
            <div class="container-fluid">
                <!-- Form Tambah Data -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Form Tambah Data</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('verif_uas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="id_verif_uas" class="form-label">ID UAS</label>
                                <input type="text" name="id_verif_uas" id="id_verif_uas" class="form-control">
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
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="verifikasi">Verifikasi</option>
                                    <option value="belum verifikasi">Belum Verifikasi</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea name="catatan" id="catatan" class="form-control"></textarea>
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
