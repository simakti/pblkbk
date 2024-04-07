@extends('layouts.backend.template')
@section('jurusan')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Prodi</h5>
                <div class="container-fluid">
                    <!-- DataJurusan -->
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
                                            <th>Kode Jurusan</th>
                                            <th>Jurusan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_jurusan as $data)
                                            <tr class="table-Light">
                                                <th>{{ $data->id_jurusan }}</th>
                                                <th>{{ $data->kode_jurusan }}</th>
                                                <th>{{ $data->jurusan }}</th>
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
