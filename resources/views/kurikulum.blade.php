@extends('layouts.backend.template')
@section('kurikulum')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Kurikulum</h5>
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
                                            <th>Kode Kurikulum</th>
                                            <th>Nama Kurikulum</th>
                                            <th>Tahun</th>
                                            <th>ID Prodi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_kurikulum as $data)
                                            <tr class="table-Light">
                                                <th>{{ $data->id_kurikulum }}</th>
                                                <th>{{ $data->kode_kurikulum }}</th>
                                                <th>{{ $data->nama_kurikulum }}</th>
                                                <th>{{ $data->tahun }}</th>
                                                <th>{{ $data->id_prodi }}</th>
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
    </div>
@endsection