@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Data Berita Acara RPS</h5>
            <div class="container-fluid">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="example" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="table-dark">
                                        <th>NO</th>
                                        <th>Mata Kuliah</th>
                                        <th>Semester</th>
                                        <th>Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_verif_rps as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->nama_matakuliah }}</td>
                                        <td>{{ $data->semester }}</td>
                                        <td>{{ $data->catatan }}</td>
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
