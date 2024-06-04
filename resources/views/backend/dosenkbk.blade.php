@extends('layouts.backend.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title  mb-4">Data Dosen KBK</h5>
                <div class="container-fluid">
                    <!-- DataDosen -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0">Aksi</h6>
                            <div class="mt-3">
                                <a href="{{ route('dosenkbk.create') }}" class="btn btn-primary">Tambah</a>
                                <a href="{{ route('dosenkbk.export') }}" class="btn btn-success"></i> <i class="fas fa-download"></i> Export</a>
                                <button type="button" class="btn btn-info" onclick="document.getElementById('fileInput').click()"><i class="fas fa-file-import"></i> Import</button>
                                <form id="importForm" action="{{ route('dosenkbk.import') }}" method="POST" enctype="multipart/form-data" style="display:none;">
                                    @csrf
                                    <input type="file" id="fileInput" name="file" style="display:none;" onchange="document.getElementById('importForm').submit()">
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-dark">
                                            <th>NO</th>
                                            <th>Nama Dosen</th>
                                            <th>Jenis KBK</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_dosenkbk as $index => $data)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $data->nama_dosen }}</td>
                                                <td>{{ $data->jenis_kbk }}</td>
                                                <td>
                                                        <form action="{{ route('dosenkbk.edit', $data->id_dosen_kbk) }}" method="GET" style="display:inline;">
                                                            <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                                        </form>
                                                        <form action="{{ route('dosenkbk.destroy', $data->id_dosen_kbk) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin untuk menghapus?')">Hapus</button>
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
