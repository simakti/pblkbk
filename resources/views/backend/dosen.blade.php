@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title  mb-4">Data Dosen</h5>
            <div class="container-fluid">
                <!-- DataDosen -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="card-header py-3">
                            <div class="d-grid gap-2 d-md-block">
                            <a href="{{ route('dosen.create') }}" class="btn btn-primary me-md-3"><i
                                        class="bi bi-file-earmark-plus"></i> New</a>
                        </div>
                        </div>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_dosen as $data)
                                        <tr>
                                            <td>{{ $data->id_dosen }}</td>
                                            <td>{{ $data->nama_dosen }}</td>
                                            <td>{{ $data->nidn }}</td>
                                            <td>{{ $data->nip }}</td>
                                            <td>{{ $data->jenis_kelamin }}</td>
                                            <td>{{ $data->jurusan }}</td>
                                            <td>{{ $data->prodi }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->image }}</td>
                                            <td>
                                                @if ($data->status == 0)
                                                    Tidak Aktif
                                                @else
                                                    Aktif
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('dosen.destroy', $data->id_dosen) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('UPDATE')
                                                    <button type="submit" class="btn btn-warning btn-sm">Update</button>
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
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
