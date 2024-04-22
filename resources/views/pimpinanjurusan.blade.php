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
                                                <td>{{ $data->id_pimpinan_jurusan }}</td>
                                                <td>{{ $data->jabatan_pimpinan }}</td>
                                                <td>{{ $data->jurusan }}</td>
                                                <td>{{ $data->nama_dosen }}</td>
                                                <td>{{ $data->periode }}</td>
                                                <td>{{ $data->status }}</td>
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
