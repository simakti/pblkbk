@extends('layouts.backend.template')
@section('dosen')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title  mb-4">Data Dosen</h5>
            <div class="container-fluid">
                <!-- DataDosen -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Aksi</h6>
                        <div class="mt-3">
                            <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah
                                Dosen</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="table-dark">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>NIDN</th>
                                        <th>NIP</th>
                                        <th>Gender</th>
                                        <th>Jurusan</th>
                                        <th>Prodi</th>
                                        <th>Email</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_dosen as $data)
                                        <tr class="table-Light">
                                            <th>{{ $data->id_dosen }}</th>
                                            <th>{{ $data->nama_dosen }}</th>
                                            <th>{{ $data->nidn }}</th>
                                            <th>{{ $data->nip }}</th>
                                            <th>{{ $data->jenis_kelamin }}</th>
                                            <th>{{ $data->jurusan }}</th>
                                            <th>{{ $data->prodi }}</th>
                                            <th>{{ $data->email }}</th>
                                            <th>{{ $data->image }}</th>
                                            <th>{{ $data->status }}</th>
                                            <th>
                                                <form action="{{ route('dosen.destroy', $data->id_dosen) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </th>
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
