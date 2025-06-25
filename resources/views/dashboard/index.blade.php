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
        <div class="row g-3">

            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('dashboard.index') }}" class="text-decoration-none">
                    <div class="card text-center shadow-sm h-100 border-0">
                        <div class="card-body py-4">
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
                                style="width:60px; height:60px;">
                                <i class="bx bx-home fs-3 text-success"></i>
                            </div>
                            <p class="mb-0 text-dark fw-semibold">Home</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('klkh.fuelStation.index') }}" class="text-decoration-none">
                    <div class="card text-center shadow-sm h-100 border-0">
                        <div class="card-body py-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
                                style="width:60px; height:60px;">
                                <i class="bx bx-gas-pump fs-3 text-primary"></i>
                            </div>
                            <p class="mb-0 text-dark fw-semibold">KLKH Fuel Station</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('users.index') }}" class="text-decoration-none">
                    <div class="card text-center shadow-sm h-100 border-0">
                        <div class="card-body py-4">
                            <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
                                style="width:60px; height:60px;">
                                <i class="bx bx-user-circle fs-3 text-info"></i>
                            </div>
                            <p class="mb-0 text-dark fw-semibold">User</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ route('kkh.index') }}"
                    class="text-decoration-none">
                    <div class="card text-center shadow-sm h-100 border-0">
                        <div class="card-body py-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
                                style="width:60px; height:60px;">
                                <i class="bx bx-task fs-3 text-warning"></i>
                            </div>
                            <p class="mb-0 text-dark fw-semibold">KKH</p>
                        </div>
                    </div>
                </a>
            </div>


        </div>
        <!-- end row -->

    </div>
</div>

@include('layout.footer')
