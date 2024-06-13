@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title  mb-4">Data Mata Kuliah KBK</h5>
            <div class="container-fluid">
                <!-- DataDosen -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="card-header py-3">
                            <div class="d-grid gap-2 d-md-block">
                            <a href="{{ route('matkul_kbk.create') }}" class="btn btn-primary me-md-3"><i
                                        class="bi bi-file-earmark-plus"></i> Tambah</a>
                            <a href="{{ route('matkul_kbk.export') }}" class="btn btn-success"></i> <i class="fas fa-download"></i> Export</a>
                            <button type="button" class="btn btn-info" onclick="document.getElementById('fileInput').click()"><i class="fas fa-file-import"></i> Import</button>
                            <form id="importForm" action="{{ route('matkul_kbk.import') }}" method="POST" enctype="multipart/form-data" style="display:none;">
                                @csrf
                                <input type="file" id="fileInput" name="file" style="display:none;" onchange="document.getElementById('importForm').submit()">
                            </form>
                        </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="example" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="table-dark">
                                        <th>No</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>Jenis KBK</th>
                                        <th>Kurikulum</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_matkul_kbk as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $data->nama_matakuliah }}</td>
                                            <td>{{ $data->jenis_kbk }}</td>
                                            <td>{{ $data->nama_kurikulum }}</td>
                                            <td>
                                                <form action="{{ route('matkul_kbk.edit', $data->id_matkul_kbk) }}" method="GET" style="display:inline;">
                                                    <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                                </form>
                                                <form action="{{ route('matkul_kbk.destroy', $data->id_matkul_kbk) }}" method="POST" style="display:inline;">
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
