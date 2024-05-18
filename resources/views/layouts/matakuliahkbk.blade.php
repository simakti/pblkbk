@extends('layouts.backend.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Matakuliah</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <a href="" class="btn btn-primary">Tambah Data</a>
                        <div class="card-header py-3">
                            <h6 class="m-0">Aksi</h6>
                            <div class="mt-3">
                                <a href="{{ route('matakuliah.create') }}" class="btn btn-primary">Tambah
                                    Matakuliah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-dark">
                                            <th>ID</th>
                                            <th>Kode Matakuliah</th>
                                            <th>Nama Matakuliah</th>
                                            <th>TP</th>
                                            <th>SKS</th>
                                            <th>Jam</th>
                                            <th>SKS_Teori</th>
                                            <th>SKS_Praktek</th>
                                            <th>Jam_Teori</th>
                                            <th>Jam_Praktek</th>
                                            <th>Semester</th>
                                            <th>ID Kurikulum</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_matakuliah as $data)
                                            <tr>
                                                <td>{{ $data->id_matakuliah }}</td>
                                                <td>{{ $data->kode_matakuliah }}</td>
                                                <td>{{ $data->nama_matakuliah }}</td>
                                                <td>{{ $data->TP }}</td>
                                                <td>{{ $data->sks }}</td>
                                                <td>{{ $data->jam }}</td>
                                                <td>{{ $data->sks_teori }}</td>
                                                <td>{{ $data->sks_praktek }}</td>
                                                <td>{{ $data->jam_teori }}</td>
                                                <td>{{ $data->jam_praktek }}</td>
                                                <td>{{ $data->semester }}</td>
                                                <td>{{ $data->id_kurikulum }}</td>

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
