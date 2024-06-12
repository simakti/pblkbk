@extends('layouts.admin.template')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Data Jenis KBK</h5>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="mt-3">
                            <a href="{{ route('datakbk.create') }}" class="btn btn-primary">Tambah</a>
                            <a href="{{ route('datakbk.export') }}" class="btn btn-success"></i> <i class="fas fa-download"></i> Export</a>
                            <button type="button" class="btn btn-info" onclick="document.getElementById('fileInput').click()"><i class="fas fa-file-import"></i> Import</button>
                            <form id="importForm" action="{{ route('datakbk.import') }}" method="POST" enctype="multipart/form-data" style="display:none;">
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
                                                <a href="{{ route('datakbk.edit', $data->id_jenis_kbk) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('datakbk.destroy', $data->id_jenis_kbk) }}" method="POST" style="display:inline;">
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
