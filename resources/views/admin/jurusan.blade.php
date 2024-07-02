@extends('layouts.admin.template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Jurusan</h5>
                <div class="container-fluid">
                    <!-- DataJurusan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="mt-3">
                                <a href="{{ route('jurusan.create') }}"></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="example" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr class="table-dark">
                                                <th>NO</th>
                                                <th>Kode Jurusan</th>
                                                <th>Jurusan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_jurusan as $index => $data)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $data->kode_jurusan }}</td>
                                                    <td>{{ $data->jurusan }}</td>
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
