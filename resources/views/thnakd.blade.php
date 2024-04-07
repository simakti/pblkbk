@extends('layouts.backend.template')
@section('thnakd')
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title mb-4">Data Tahun Akademik</h5>
            <div class="container-fluid">
                <!-- DataThnakd -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Aksi</h6>
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
                                        <tr class="table-Light">
                                            <th>{{ $data->id_thnakd }}</th>
                                            <th>{{ $data->thn_akd }}</th>
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
@endsection
