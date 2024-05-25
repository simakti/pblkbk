@extends('layouts.backend.template')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title  mb-4">Data RPS</h5>
            <div class="container-fluid">
                <!-- DataDosen -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Aksi</h6>
                        <div class="mt-3">
                            <a href="{{ route('rps.create') }}" class="btn btn-primary">Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="table-dark">
                                        <th>Status</th>
                                        <th>ID RPS</th>
                                        <th>Dosen</th>
                                        <th>Tanggal Verif</th>
                                        <th>File</th>
                                        <th>Catatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_verif_rps as $data)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="status[]" value="{{ $data->status }}" {{ $data->status == 'diverifikasi' ? 'checked' : '' }}>
                                        </td>
                                        <td>{{ $data->id_verif_rps }}</td>
                                        <td>{{ $data->nama_dosen }}</td>
                                        <td>{{ $data->tanggal_verif }}</td>
                                        <td>{{ $data->file }}</td>
                                        <td>{{ $data->catatan }}</td>
                                        <td>

                                        <a href="{{ route('rps.edit', $data->id_verif_rps) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('rps.destroy', $data->id_verif_rps) }}" method="POST">
                                                @csrf
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