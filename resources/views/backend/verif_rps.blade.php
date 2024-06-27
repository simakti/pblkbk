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
                            <a href="{{ route('verif_rps.create') }}" class="btn btn-primary">Tambah</a>
                            @csrf
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Add a canvas for the chart -->
                        <canvas id="rpsChart" width="400" height="200"></canvas>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="example" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="table-dark">
                                        <th>NO</th>
                                        <th>Tahun Akademik</th>
                                        <th>Dosen Upload RPS</th>
                                        <th>Matakuliah</th>
                                        <th>Semester</th>
                                        <th>Dosen Verifikasi</th>
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
                                        <td>{{ $data->nama_upload }}</td>
                                        <td>{{ $data->nama_matakuliah }}</td>
                                        <td>{{ $data->semester }}</td>
                                        <td>{{ $data->nama_verifikasi }}</td>
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
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('rpsChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($years) !!},
            datasets: [{
                label: 'Total RPS Uploads',
                data: {!! json_encode($rpsUploads) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }, {
                label: 'Total RPS Verifications',
                data: {!! json_encode($rpsVerifications) !!},
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endsection
