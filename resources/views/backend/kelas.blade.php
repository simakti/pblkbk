@extends('layouts.backend.template')
@section('content')
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
                            <div class="mt-3">
                                <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah
                                    Kelas</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-dark">
                                            <th>NO</th>
                                            <th>Kode Kelas</th>
                                            <th>Nama Kelas</th>
                                            <th>Program Studi</th>
                                            <th>ID Tahun Akademik</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<<<<<<< HEAD:resources/views/kelas.blade.php
                                        @foreach ($data_kelas as $data)
                                            <tr class="table-Light">
                                                <th>{{ $data->id_kelas }}</th>
                                                <th>{{ $data->kode_kelas }}</th>
                                                <th>{{ $data->nama_kelas }}</th>
                                                <th>{{ $data->prodi }}</th>
                                                <th>{{ $data->thn_akd }}</th>
=======
                                        @foreach ($data_kelas as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                                <td>{{ $data->kode_kelas }}</td>
                                                <td>{{ $data->nama_kelas }}</td>
                                                <td>{{ $data->prodi }}</td>
                                                <td>{{ $data->thn_akd }}</td>
>>>>>>> 158aa074a415d585f03fe37423c3598d2ad10aa8:resources/views/backend/kelas.blade.php
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
