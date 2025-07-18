@extends('layouts.admin.template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <!-- Page Heading -->
                <h5 class="card-title mb-4">Data Verifikasi Soal UAS</h5>
                <div class="container-fluid">
                    <!-- DataVerifikasi -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="mt-3">
                                <a href="{{ route('verif_uas.create') }}" class="btn btn-primary">Tambah</a>
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
                                            <th>Matakuliah</th>
                                            <th>Smstr</th>
                                            <th>Dosen Upload</th>
                                            <th>File</th>
                                            <th>Status</th>
                                            <th>Catatan</th>
                                            <th>Tanggal Verifikasi</th>
                                            @hasrole('admin|penguruskbk|kaprodi')
                                            <th>Aksi</th>
                                            @endhasrole
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
                                                    <a href="{{ 'storage/public/uploads/ver_files/' . $data->file }}"
                                                        target="_blank">Lihat file</a>
                                                </td>
                                                <td>
                                                    @if ($data->status_verif_uas == 0)
                                                        Tidak Diverifikasi
                                                    @else
                                                        Diverifikasi
                                                    @endif

                                                </td>
                                                <td>{{ $data->catatan }}</td>
                                                <td>{{ $data->tanggal_diverifikasi }}</td>
                                                @hasrole('admin|penguruskbk|kaprodi')
                                                <td>
                                                    <form action="{{ route('verif_uas.edit', $data->id_verif_uas) }}"
                                                        method="GET" style="display:inline;">
                                                        <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                                                    </form>
                                                    <form action="{{ route('verif_uas.destroy', $data->id_verif_uas) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Apakah Anda yakin untuk menghapus?')">Hapus</button>
                                                    </form>
                                                </td>
                                                @endhasrole
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h6 class="card-title mb-4">Grafik Verifikasi UAS</h6>
                                <div id="chartUas"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script type="text/javascript">
        async function getDataUas() {
            let data_grafik = [];
            await fetch('{{ route('grafik.verifikasi_uas') }}')
                .then(response => response.json())
                .then((data) => {
                    data_grafik = data.data;
                })
                .catch(error => {
                    console.error('Error:', error);
                });

            let updatedData = data_grafik.map(item => ({
                x: item.tahun_akademik,
                y: item.jumlah_verifikasi
            }));

            var options = {
                chart: {
                    type: 'bar',
                    height: 350
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Verifikasi'
                    },
                    labels: {
                        formatter: function(value) {
                            return Number.isInteger(value) ? value : '';
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
                    name: 'Jumlah Verifikasi',
                    data: updatedData
                }]
            };

            var chart = new ApexCharts(document.querySelector("#chartUas"), options);
            chart.render();
        }

        getDataUas();
    </script>
@endsection
