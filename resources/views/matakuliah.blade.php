@extends('layouts.backend.template')
@section('matakuliah')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Matakuliah</h5>
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
                                            <tr class="table-Light">
                                                <th>{{ $data->id_matakuliah }}</th>
                                                <th>{{ $data->kode_matakuliah }}</th>
                                                <th>{{ $data->nama_matakuliah }}</th>
                                                <th>{{ $data->TP }}</th>
                                                <th>{{ $data->sks }}</th>
                                                <th>{{ $data->jam }}</th>
                                                <th>{{ $data->sks_teori }}</th>
                                                <th>{{ $data->sks_praktek }}</th>
                                                <th>{{ $data->jam_teori }}</th>
                                                <th>{{ $data->jam_praktek }}</th>
                                                <th>{{ $data->semester }}</th>
                                                <th>{{ $data->id_kurikulum }}</th>

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
