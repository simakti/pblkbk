@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Tambah Data RPS</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Form Tambah Data</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('repo_rps.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
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
                            <div class="mb-3">
                                <label for="file" class="form-label">File</label>
                                <input type="file" name="file" id="file" class="form-control">
                                @error('file')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
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
