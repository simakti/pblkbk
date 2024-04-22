@extends('layouts.backend.template')
@section('kelas')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Kelas</h5>
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
                                            <th>Kode Kelas</th>
                                            <th>Nama Kelas</th>
                                            <th>ID Prodi</th>
                                            <th>ID Tahun Akademik</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_kelas as $data)
                                            <tr>
                                                <td>{{ $data->id_kelas }}</td>
                                                <td>{{ $data->kode_kelas }}</td>
                                                <td>{{ $data->nama_kelas }}</td>
                                                <td>{{ $data->id_prodi }}</td>
                                                <td>{{ $data->id_thnakd }}</td>
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
