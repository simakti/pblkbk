@extends('layouts.backend.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Dosen Matakuliah</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0">Aksi</h6>
                            <div class="mt-3">
                                <a href="{{ route('dosen_matkul.create') }}"></a>
                                <a href="{{ route('dosen_matkul.export') }}" class="btn btn-success"></i> <i class="fas fa-download"></i> Export</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-dark">
                                            <th>NO</th>
                                            <th>Nama Dosen</th>
                                            <th>Nama Matakuliah</th>
                                            <th>Kelas</th>
                                            <th>Tahun Akademik</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($data_dosenmatkul as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->nama_matakuliah }}</td>
                                                <td>{{ $data->nama_kelas }}</td>
                                                <td>{{ $data->smt_thn_akd }}</td>
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
