@extends('layouts.admin.template')
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title fw-semibold mb-4">Grafik dan Tabel Pengunggahan dan Verifikasi RPS</h5>
                <div class="container-fluid">
                    <!-- DataVerifikasiRPS -->
                    <div class="card shadow my-4">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Grafik</h6>
                            </div>
                            <div class="card-body">
                                <div id="chart"></div>
                            </div>
                        </div>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                                <a href="{{ url('storage/public/uploads/ver_files/' . $data->file) }}" target="_blank">Lihat file</a>
                                            </td>
                                            <td>
                                                @if ($data->status_verif_rps == 0)
                                                    Tidak Aktif
                                                @else
                                                    Aktif
                                                @endif
                                            </td>
                                            <td>{{ $data->catatan }}</td>
                                            <td>{{ $data->tanggal_diverifikasi }}</td>
                                            <td>
                                                <!-- Add action buttons if needed -->
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script type="text/javascript">
    // Ambil data yang dikirimkan dari controller
    var dataGrafik = <?php echo json_encode($data_grafik); ?>;

    // Siapkan data untuk chart
    var labels = [];
    var banyakPengunggahan = [];
    var banyakVerifikasi = [];

    dataGrafik.forEach(function(item) {
        labels.push(item.tahun_akademik);
        banyakPengunggahan.push(item.banyak_pengunggahan);
        banyakVerifikasi.push(item.banyak_verifikasi);
    });

    // Konfigurasi chart menggunakan ApexCharts
    var options = {
        series: [{
            name: 'Banyak Pengunggahan',
            data: banyakPengunggahan
        }, {
            name: 'Banyak Verifikasi',
            data: banyakVerifikasi
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '15%',
                endingShape: 'rounded'
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: labels,
        },
        yaxis: {
            title: {
                text: 'Jumlah'
            },
            labels: {
                formatter: function (value) {
                    if (Number.isInteger(value)) {
                        return value;
                    }
                    return '';
                }
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return parseInt(val) + " RPS";
                }
            }
        }
    };

    // Inisialisasi chart dengan konfigurasi
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

@endsection
