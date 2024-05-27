@extends('layouts.backend.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Prodi</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0">Aksi</h6>
                            <div class="mt-3">
                                <a href="{{ route('prodi.create') }}" class="btn btn-primary">Tambah
                                    Prodi</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-dark">
                                            <th>NO</th>
                                            <th>Kode Prodi</th>
                                            <th>Prodi</th>
                                            <th>ID Jurusan</th>
                                            <th>Jenjang</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<<<<<<< HEAD:resources/views/prodi.blade.php
                                        @foreach ($data_prodi as $data)
                                            <tr class="table-Light">
                                                <th>{{ $data->id_prodi }}</th>
                                                <th>{{ $data->kode_prodi }}</th>
                                                <th>{{ $data->prodi }}</th>
                                                <th>{{ $data->jurusan }}</th>
                                                <th>{{ $data->jenjang }}</th>
=======
                                        @foreach ($data_prodi as $index => $data)
                                        <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $data->kode_prodi }}</td>
                                                <td>{{ $data->prodi }}</td>
                                                <td>{{ $data->jurusan }}</td>
                                                <td>{{ $data->jenjang }}</td>
>>>>>>> 158aa074a415d585f03fe37423c3598d2ad10aa8:resources/views/backend/prodi.blade.php
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
