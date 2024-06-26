@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Pimpinan Jurusan</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-dark">
                                            <th>NO</th>
                                            <th>Jabatan</th>
                                            <th>Jurusan</th>
                                            <th>Nama Dosen</th>
                                            <th>Periode</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_pimpinanjurusan as $index => $data)
                                        <tr>
                                                <td>{{ $index + 1 }}</td>
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
