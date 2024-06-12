@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Kelas</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="mt-3">
                                <a href="{{ route('kelas.create') }}"></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="example" width="100%" cellspacing="0">
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

                                        @foreach ($data_kelas as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                                <td>{{ $data->kode_kelas }}</td>
                                                <td>{{ $data->nama_kelas }}</td>
                                                <td>{{ $data->prodi }}</td>
                                                <td>{{ $data->thn_akd }}</td>
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
