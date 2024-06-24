<<<<<<<< HEAD:resources/views/admin/repo_rps.blade.php
@extends('layouts.admin.template')
========
@extends('layouts.backend.template')

>>>>>>>> 28d638665c65bf109ef3b6fbd2b2333a2dff0a3e:resources/views/backend/repo_rps.blade.php
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-body">
            <!-- Page Heading -->
            <h5 class="card-title mb-4">Data Upload RPS</h5>
            <div class="container-fluid">
                <!-- DataDosen -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="mt-3">
                            <a href="{{ route('repo_rps.create') }}" class="btn btn-primary">Tambah</a>
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
                                        <th>Nama Dosen</th>
                                        <th>Matakuliah</th>
                                        <th>Semester</th>
                                        <th>File</th>
                                        <th>Aksi</th>
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
                                            <a href="{{ asset('storage/uploads/ver_files/' . $data->file) }}" target="_blank">Lihat file</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('repo_rps.edit', $data->id_repo_rps) }}" method="GET" style="display:inline;">
                                                <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                            </form>
                                            <form action="{{ route('repo_rps.destroy', $data->id_repo_rps) }}" method="POST" style="display:inline;">
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

                <!-- Chart Placeholder -->
                <div class="mt-4">
                    <h5 class="card-title mb-4">Grafik Upload RPS per Tahun Akademik</h5>
                    <canvas id="rpsUploadChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // PHP data passed from Blade to JavaScript
        const banyakPengunggahan = @json($banyakPengunggahan);
        const semesters = @json($semesters);

        // Prepare data for Chart.js
        const data = {
            labels: semesters,
            datasets: [{
                label: 'Number of RPS Uploads',
                data: Object.values(banyakPengunggahan),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Chart.js configuration
        const ctx = document.getElementById('rpsUploadChart').getContext('2d');
        const rpsUploadChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Uploads'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Academic Year'
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
