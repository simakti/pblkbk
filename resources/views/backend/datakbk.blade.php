@extends('layouts.backend.template')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Data Jenis KBK</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0">Aksi</h6>
                        <div class="mt-3">
                            <a href="{{ route('datakbk.create') }}" class="btn btn-primary">Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="table-dark">
                                        <th>ID</th>
                                        <th>Jenis KBK</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_datakbk as $data)
                                        <tr>
                                            <td>{{ $data->id_jenis_kbk }}</td>
                                            <td>{{ $data->jenis_kbk }}</td>
                                            <td>{{ $data->deskripsi }}</td>
                                            <td>
                                                <form action="{{ route('datakbk.edit', $data->id_jenis_kbk) }}" method="GET" style="display:inline;">
                                                    <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                                </form>
                                                <form action="{{ route('datakbk.destroy', $data->id_jenis_kbk) }}" method="POST" style="display:inline;">
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
