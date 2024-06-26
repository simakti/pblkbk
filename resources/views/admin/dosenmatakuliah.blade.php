@extends('layouts.admin.template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Dosen Pengampu</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="example" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dosen</th>
                                            <th>Nama Matakuliah</th>
                                            <th>Nama Kelas</th>
                                            <th>Tahun Akademik</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_dosenmatakuliah as $index => $data)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $data->nama_dosen }}</td>
                                                <td>{{ $data->nama_matakuliah }}</td>
                                                <td>{{ $data->nama_kelas }}</td>
                                                <td>{{ $data->tahun_akademik }}</td>
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
