@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Kurikulum</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="mt-3">
                                <a href="{{ route('kurikulum.create') }}" ></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-dark">
                                            <th>NO</th>
                                            <th>Kode Kurikulum</th>
                                            <th>Nama Kurikulum</th>
                                            <th>Tahun</th>
                                            <th>ID Prodi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_kurikulum as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                                <td>{{ $data->kode_kurikulum }}</td>
                                                <td>{{ $data->nama_kurikulum }}</td>
                                                <td>{{ $data->tahun }}</td>
                                                <td>{{ $data->prodi }}</td>
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
