@include('layout.head', ['title' => 'Home'])
@include('layout.header')
@include('layout.theme_settings')
@include('layout.sidebar')

<div class="page-content">

    <!-- Start Container Fluid -->
    <div class="container-fluid">

        <!-- ========== Page Title Start ========== -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="mb-0 fw-semibold">Menu Utama</h4>
                </div>
            </div>
        </div>
        <!-- ========== Page Title End ========== -->

        <!-- Start here.... -->
        <div class="row g-3">

            {{-- MENU ATAS --}}
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('klkh.fuelStation.index') }}" class="text-decoration-none">
                    <div class="card text-center shadow-sm border-0 h-100">
                        <div class="card-body py-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
                                style="width:60px; height:60px;">
                                <i class="bx bx-task fs-3 text-primary"></i>
                            </div>
                            <p class="mb-0 text-dark fw-semibold">KLKH Fuel Station</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('kkh.index') }}" class="text-decoration-none">
                    <div class="card text-center shadow-sm border-0 h-100">
                        <div class="card-body py-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
                                style="width:60px; height:60px;">
                                <i class="bx bx-task fs-3 text-primary"></i>
                            </div>
                            <p class="mb-0 text-dark fw-semibold">KKH</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none"
                    onclick="Swal.fire('Fitur masih belum difungsikan!'); return false;">
                    <div class="card text-center shadow-sm border-0 h-100">
                        <div class="card-body py-4">
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
                                style="width:60px; height:60px;">
                                <i class="bx bx-home fs-3 text-success"></i>
                            </div>
                            <p class="mb-0 text-dark fw-semibold">P2H</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none"
                    onclick="Swal.fire('Fitur masih belum difungsikan!'); return false;">
                    <div class="card text-center shadow-sm border-0 h-100">
                        <div class="card-body py-4">
                            <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
                                style="width:60px; height:60px;">
                                <i class="bx bx-gas-pump fs-3 text-info"></i>
                            </div>
                            <p class="mb-0 text-dark fw-semibold">FuelMan</p>
                        </div>
                    </div>
                </a>
            </div>

            {{-- BARIS BAWAH: CHART & TABEL --}}
            <div class="col-12 col-lg-12">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title mb-3 anchor" id="datalabels">Pengisian KLKH</h4>
                        <div dir="ltr">
                            <div id="datalabels-column" class="apex-charts"></div>
                        </div>
                    </div>
                    <!-- end card body-->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box" style="padding-top:1rem;padding-bottom:0rem;">
                        <h4 class="mb-0 fw-semibold">Kesiapan Kerja Harian (KKH)</h4>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card h-100 border-0" style="background:#fff3cd; box-shadow:0 0 10px rgba(255,193,7,0.5);">
                    <div class="card-body">
                        <h4 class="card-title mb-3 anchor">Belum Diverifikasi</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kkhBelumDiverifikasi as $row)
                                    <tr>
                                        <td>{{ $row->NIK_PENGISI }}</td>
                                        <td>{{ $row->NAMA_PENGISI }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card h-100 border-0" style="background:#f8d7da; box-shadow:0 0 10px rgba(220,53,69,0.5);">
                    <div class="card-body">
                        <h4 class="card-title mb-3 anchor">Unfit</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kkhUnfit as $row)
                                    <tr>
                                        <td>{{ $row->NIK_PENGISI }}</td>
                                        <td>{{ $row->NAMA_PENGISI }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card h-100 border-0" style="background:#cfe2ff; box-shadow:0 0 10px rgba(13,110,253,0.5);">

                    <div class="card-body">
                        <h4 class="card-title mb-3 anchor">Tidur di bawah 6 jam</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kkhdibawah6Jam as $row)
                                    <tr>
                                        <td>{{ $row->NIK_PENGISI }}</td>
                                        <td>{{ $row->NAMA_PENGISI }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div> {{-- end .row --}}

    </div> {{-- end .container-fluid --}}

</div> {{-- end .page-content --}}

@include('layout.footer')

<script>
    const chartLabels = @json($chartLabels);
    const chartData = @json($chartData);
    options = {
        chart: {
            height: 380,
            type: "bar",
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            bar: {
                borderRadius: 10,
                dataLabels: {
                    position: "top"
                }
            }
        },
        dataLabels: {
            enabled: !0,
            formatter: function (e) {
                return e
            },
            offsetY: -25,
            style: {
                fontSize: "12px",
                colors: ["#304758"]
            }
        },
        colors: colors = ["#7dcc93"],
        legend: {
            show: !0,
            horizontalAlign: "center",
            offsetX: 0,
            offsetY: -5
        },
        series: [{
            name: "Jumlah",
            data: chartData
        }],
        xaxis: {
            categories: chartLabels,
            position: "top",
            labels: {
                offsetY: 0
            },
            axisBorder: {
                show: !1
            },
            axisTicks: {
                show: !1
            },
            crosshairs: {
                fill: {
                    type: "gradient",
                    gradient: {
                        colorFrom: "#D8E3F0",
                        colorTo: "#BED1E6",
                        stops: [0, 100],
                        opacityFrom: .6,
                        opacityTo: .5
                    }
                }
            },
            tooltip: {
                enabled: !0,
                offsetY: -10
            }
        },
        fill: {
            gradient: {
                enabled: !1,
                shade: "light",
                type: "horizontal",
                shadeIntensity: .25,
                gradientToColors: void 0,
                inverseColors: !0,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [50, 0, 100, 100]
            }
        },
        yaxis: {
            axisBorder: {
                show: !1
            },
            axisTicks: {
                show: !1
            },
            labels: {
                show: !1,
                formatter: function (e) {
                    return e
                }
            }
        },
        title: {
            text: "Data " + chartLabels[0] + " – " + chartLabels[chartLabels.length - 1],
            floating: !0,
            offsetY: 360,
            align: "center",
            style: {
                color: "#444"
            }
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"],
                opacity: .2
            },
            borderColor: "#f1f3fa"
        }
    };
    (chart = new ApexCharts(document.querySelector("#datalabels-column"), options)).render();

</script>
