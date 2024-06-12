@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Matakuliah</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="mt-3">
                                <a href="{{ route('matakuliah.create') }}"></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-dark">
                                            <th>NO</th>
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
                                        @foreach ($data_matakuliah as $index => $data)
                                        <tr>
                                                <td>{{ $index + 1 }}</td>
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
