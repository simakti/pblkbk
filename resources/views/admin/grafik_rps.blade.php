@extends('layouts.admin.template')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Data Upload RPS</h5>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <div class="card mt-4">
                            <div class="card-body">
                                <h6 class="card-title mb-4">Grafik Upload RPS</h6>
                                <div id="chart"></div>
                            </div>
                        </div>
                        </div>
                        <!-- Script Section -->
                        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                        <script type="text/javascript">
                        async function getData() {
                        let pengunggahan = [];
                        let updatedData = [];
                        await fetch('http://127.0.0.1:8000/api/graphics/rps')
                            .then(response => response.json())
                            .then((data) => {
                                pengunggahan = data.data.banyak_pengunggahan;
                                updatedData = pengunggahan.map(item => ({
                                    x: item.tahun_akademik,
                                    y: item.banyak_pengunggahan
                                }));
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });

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
                                data: updatedData
                            }]
                        };

                        var chart = new ApexCharts(document.querySelector("#chart"), options);
                        chart.render();
                        }

                        getData();
                        </script>
                        <!-- End Script Section -->
                        @endsection
