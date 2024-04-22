@extends('layouts.backend.template')
@section('jurusan')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title mb-4">Data Jurusan</h5>
                <div class="container-fluid">
                    <!-- DataJurusan -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0">Aksi</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-dark">
                                            <th>ID</th>
                                            <th>Kode Jurusan</th>
                                            <th>Jurusan</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_jurusan as $data)
                                            <tr>
                                                <td>{{ $data->id_jurusan }}</td>
                                                <td>{{ $data->kode_jurusan }}</td>
                                                <td>{{ $data->jurusan }}</td>
                                                <td>
                                                    <form action="{{ route('jurusan.destroy', $data->id_jurusan) }}"
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
