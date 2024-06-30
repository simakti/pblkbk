@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title  mb-4">Data Dosen</h5>
            <div class="container-fluid">
                <!-- DataDosen -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="example" >
                                <thead>
                                    <tr class="table-dark">
                                        <th>NO</th>
                                        <th>Nama Dosen</th>
                                        <th>NIDN</th>
                                        <th>Jurusan</th>
                                        <th>Prodi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_dosen as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $data->nama_dosen }}</td>
                                            <td>{{ $data->nidn }}</td>
                                            <td>{{ $data->jurusan }}</td>
                                            <td>{{ $data->prodi }}</td>
                                            <td>
                                                @if ($data->status == 0)
                                                    Tidak Aktif
                                                @else
                                                    Aktif
                                                @endif
                                            </td>
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
