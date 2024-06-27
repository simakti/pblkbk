@extends('layouts.admin.template')

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
                                <table class="table table-bordered table-striped" id="example" width="100%"
                                    cellspacing="0">
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
                                                    <a href="{{ asset('storage/uploads/ver_files/' . $data->file) }}"
                                                        target="_blank">Lihat file</a>
                                                </td>

                                                <td>
                                                    <form action="{{ route('repo_rps.edit', $data->id_repo_rps) }}"
                                                        method="GET" style="display:inline;">
                                                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                                    </form>
                                                    <form action="{{ route('repo_rps.destroy', $data->id_repo_rps) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Apakah Anda yakin untuk menghapus?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <h6 class="card-title mb-4">Grafik Upload RPS</h6>
                    <!-- Grafik Section -->
                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Section -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript">
        // var pengunggahan = @json($banyak_pengunggahan ?? []);

        // var data_url = 'http://127.0.0.1:8000/api/graphics/rps';
        async function getData() {
            var pengunggahan = []
            var updatedData = []
            let hitApi = await fetch('http://127.0.0.1:8000/api/graphics/rps')
                .then(response => response.json())
                .then((data) => {
                    pengunggahan = data.data.banyak_pengunggahan;
                    updatedData = pengunggahan.map(item => {
                        return {
                            x: item.tahun_akademik,
                            y: item.banyak_pengunggahan
                        };
                    });
                    // console.log(pengunggahan);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            console.log(updatedData);
            var options = {
                chart: {
                type: 'bar',
                height: 350
            },
            yaxis: {
                title: {
                    text: 'Jumlah'
                },
                labels: {
                    formatter: function(value) {
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
                series: [{
                    data: updatedData
                }]
            }
            console.log(options);
            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
            // return updatedData
        }

        getData();

        // var verifikasi = @json($banyak_verifikasi ?? []);
        // var semester = @json($semester ?? []);
        // console.log(updatedData);


        // var options = {
        //     series: [
        //         {
        //             name: 'Banyak Pengunggahan',
        //             data: Object.values(pengunggahan)
        //         },
        //         {
        //             name: 'Banyak Verifikasi',
        //             data: Object.values(verifikasi)
        //         }
        //     ],
        //     chart: {
        //         type: 'bar',
        //         height: 350
        //     },
        //     plotOptions: {
        //         bar: {
        //             horizontal: false,
        //             columnWidth: '15%',
        //             endingShape: 'rounded'
        //         }
        //     },
        //     dataLabels: {
        //         enabled: false
        //     },
        //     stroke: {
        //         show: true,
        //         width: 2,
        //         colors: ['transparent']
        //     },
        //     xaxis: {
        //         categories: Object.keys(pengunggahan), // Assuming both pengunggahan and verifikasi have the same keys
        //     },
        //     yaxis: {
        //         title: {
        //             text: 'Jumlah'
        //         },
        //         labels: {
        //             formatter: function(value) {
        //                 if (Number.isInteger(value)) {
        //                     return value;
        //                 }
        //                 return '';
        //             }
        //         }
        //     },
        //     fill: {
        //         opacity: 1
        //     },
        //     tooltip: {
        //         y: {
        //             formatter: function(val) {
        //                 return parseInt(val) + " RPS";
        //             }
        //         }
        //     }
        // };


    </script>
    <!-- End Script Section -->
@endsection
