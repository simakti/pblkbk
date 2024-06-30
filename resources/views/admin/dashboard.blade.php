@extends('layouts.admin.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard Admin</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Grafik Pengunggahan RPS -->
                            <div class="card">
                                <div class="card-header">Grafik Pengunggahan RPS</div>
                                <div class="card-body">
                                    <canvas id="chartUpload" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Grafik Verifikasi RPS -->
                            <div class="card">
                                <div class="card-header">Grafik Verifikasi RPS</div>
                                <div class="card-body">
                                    <canvas id="chartVerification" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Tabel Pengunggahan RPS -->
                            <div class="card">
                                <div class="card-header">Tabel Pengunggahan RPS</div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr class="table-dark">
                                                <th>NO</th>
                                                <th>Tahun Akademik</th>
                                                <th>Nama Dosen</th>
                                                <th>Matakuliah</th>
                                                <th>Semester</th>
                                                <th>File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_repo_rps as $index => $data)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $data->thn_akd }}</td>
                                                <td>{{ $data->nama_dosen }}</td>
                                                <td>{{ $data->nama_matakuliah }}</td>
                                                <td>{{ $data->semester }}</td>
                                                <td>
                                                    <a href="{{ asset('storage/' . $data->file) }}" target="_blank">Lihat file</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- Tabel Verifikasi RPS -->
                            <div class="card">
                                <div class="card-header">Tabel Verifikasi RPS</div>
                                <div class="card-body">
                                    <table class="table">
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
                                            @foreach ($data_verif_rps as $index => $data)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $data->thn_akd }}</td>
                                                <td>{{ $data->nama_matakuliah }}</td>
                                                <td>{{ $data->semester }}</td>
                                                <td>{{ $data->nama_upload }}</td>
                                                <td>
                                                    <a href="{{('storage/uploads/ver_files/' . $data->file) }}" target="_blank">Lihat file</a>
                                                </td>
                                                <td>{{ $data->status_verif_rps }}</td>
                                                <td>{{ $data->catatan }}</td>
                                                <td>{{ $data->tanggal_diverifikasi }}</td>

                                                <td>
                                                    <form action="{{ route('verif_rps.edit', $data->id_verif_rps) }}" method="GET" style="display:inline;">
                                                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                                    </form>
                                                    <form action="{{ route('verif_rps.destroy', $data->id_verif_rps) }}" method="POST" style="display:inline;">
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
    </div>
</div>

<!-- Script untuk Grafik Pengunggahan RPS -->
<script>
    var ctxUpload = document.getElementById('chartUpload').getContext('2d');
    var chartUpload = new Chart(ctxUpload, {
        type: 'bar',
        data: {
            labels: {!! json_encode($uploadData->pluck('tahun_akademik')) !!},
            datasets: [{
                label: 'Jumlah Pengunggahan RPS',
                data: {!! json_encode($uploadData->pluck('jumlah')) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!-- Script untuk Grafik Verifikasi RPS -->
<script>
    var ctxVerification = document.getElementById('chartVerification').getContext('2d');
    var chartVerification = new Chart(ctxVerification, {
        type: 'bar',
        data: {
            labels: {!! json_encode($verifikasiData->pluck('tahun_akademik')) !!},
            datasets: [{
                label: 'Jumlah Verifikasi RPS',
                data: {!! json_encode($verifikasiData->pluck('jumlah')) !!},
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
