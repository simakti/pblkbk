@extends('layouts.admin.template')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title  mb-4">Data Verifikasi Soal UAS</h5>
            <div class="container-fluid">
                <!-- DataDosen -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="mt-3">
                            <a href="{{ route('verif_uas.create') }}" class="btn btn-primary">Tambah</a>
                            @csrf
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="example" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="table-dark">
                                        <th>NO</th>
                                        <th>Tahun Akademik</th>
                                        <th>Matakuliah</th>
                                        <th>Smstr</th>
                                        <th>Dosen Upload</th>
                                        <th>File</th>
                                        <th>Status</th>
                                        <th>Catatan</th>
                                        <th>Tanggal Verifikasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_verif_uas as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->thn_akd }}</td>
                                        <td>{{ $data->nama_matakuliah }}</td>
                                        <td>{{ $data->semester }}</td>
                                        <td>{{ $data->nama_upload }}</td>
                                        <td>
                                            <a href="{{('storage/uploads/ver_files/' . $data->file) }}" target="_blank">Lihat file</a>
                                        </td>
                                        <td>{{ $data->status_verif_uas }}</td>
                                        <td>{{ $data->catatan }}</td>
                                        <td>{{ $data->tanggal_diverifikasi }}</td>

                                        <td>
                                            <form action="{{ route('verif_uas.edit', $data->id_verif_uas) }}" method="GET" style="display:inline;">
                                                <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                            </form>
                                            <form action="{{ route('verif_uas.destroy', $data->id_verif_uas) }}" method="POST" style="display:inline;">
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
