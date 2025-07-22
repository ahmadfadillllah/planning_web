@include('layout.head')
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
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('klkh.fuelStation.index') }}" class="text-decoration-none">
                    <div class="card text-center shadow-sm border-0">
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
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body py-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
                                style="width:60px; height:60px;">
                                <i class="bx bx-gas-pump fs-3 text-primary"></i>
                            </div>
                            <p class="mb-0 text-dark fw-semibold">KKH</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="#" class="text-decoration-none" onclick="Swal.fire('Fitur masih belum difungsikan!'); return false;">
                    <div class="card text-center shadow-sm border-0">
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
                <a href="#" class="text-decoration-none" onclick="Swal.fire('Fitur masih belum difungsikan!'); return false;">
                    <div class="card text-center shadow-sm border-0">
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

            <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3anchor" id="datalabels">Pengisian KLKH</h4>
                                <div dir="ltr">
                                    <div id="datalabels-column" class="apex-charts"></div>
                                </div>
                            </div>
                            <!-- end card body-->
                        </div>

        </div>
        <!-- end row -->

    </div>
</div>
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
        text: "Data Tahun " + new Date().getFullYear(),
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
