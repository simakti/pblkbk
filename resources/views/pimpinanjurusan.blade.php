@extends('layouts.backend.template')
@section('pimpinanjurusan')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Pimpinan Jurusan</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0">Aksi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-dark">
                                            <th>ID</th>
                                            <th>Jabatan</th>
                                            <th>Jurusan</th>
                                            <th>Nama Dosen</th>
                                            <th>Periode</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_pimpinanjurusan as $data)
                                            <tr class="table-Light">
                                                <th>{{ $data->id_pimpinan_jurusan }}</th>
                                                <th>{{ $data->jabatan_pimpinan }}</th>
                                                <th>{{ $data->jurusan }}</th>
                                                <th>{{ $data->nama_dosen }}</th>
                                                <th>{{ $data->periode }}</th>
                                                <th>{{ $data->status }}</th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
