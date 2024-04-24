@extends('layouts.backend.template')
@section('content')
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title mb-4">Data Tahun Akademik</h5>
            <div class="container-fluid">
                <!-- DataThnakd -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Aksi</h6>
                        <div class="mt-3">
                            <a href="{{ route('thnakd.create') }}" class="btn btn-primary">Tambah
                                Dosen</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="table-dark">
                                        <th>ID</th>
                                        <th>Tahun Akademik</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_thnakd as $data)
                                        <tr>
                                            <td>{{ $data->id_thnakd }}</td>
                                            <td>{{ $data->thn_akd }}</td>
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
@endsection
