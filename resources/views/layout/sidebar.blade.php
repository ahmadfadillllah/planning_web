<div class="main-nav">
    <!-- Sidebar Logo -->
    <div class="logo-box">
        <a href="index.html" class="logo-light">
            <img src="{{ asset('app') }}/assets/images/sims3.png" class="img-fluid" width="100px" alt="logo">
            <span class="badge bg-info">{{ config('app.name') }}</span>
        </a>
    </div>

    <!-- Menu Toggle Button (sm-hover) -->
    <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
        <i class="ri-menu-2-line fs-24 button-sm-hover-icon"></i>
    </button>

    <div class="scrollbar" data-simplebar>

        <ul class="navbar-nav" id="navbar-nav">

            <li class="menu-title">Dashboard</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <span class="nav-icon">
                        <i class="ri-dashboard-2-line"></i>
                    </span>
                    <span class="nav-text">Home</span>
                </a>
            </li>
            <li class="menu-title">Menu</li>
            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#daftarLaporanSidebar" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="daftarLaporanSidebar">
                    <span class="nav-icon">
                        <i class="ri-news-line"></i>
                    </span>
                    <span class="nav-text"> Daftar Laporan </span>
                </a>
                <div class="collapse" id="daftarLaporanSidebar">
                    <ul class="nav sub-navbar-nav">

                        <li class="sub-nav-item">
                            <a class="sub-nav-link  menu-arrow" href="#laporanKLKH" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="laporanKLKH">
                                <span> Laporan KLKH </span>
                            </a>
                            <div class="collapse" id="laporanKLKH">
                                <ul class="nav sub-navbar-nav">
                                    <li class="sub-nav-item">
                                        <a class="sub-nav-link" href="{{ route('klkh.fuelStation.report') }}">Fuel Station</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-arrow" href="#formSAPSidebar" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="formSAPSidebar">
                    <span class="nav-icon">
                        <i class="ri-layout-line"></i>
                    </span>
                    <span class="nav-text"> Form SAP </span>
                </a>
                <div class="collapse" id="formSAPSidebar">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ route('klkh.fuelStation.index') }}">KLKH Fuel Station</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kkh.index') }}">
                    <span class="nav-icon">
                        <i class="ri-task-line"></i>
                    </span>
                    <span class="nav-text">KKH</span>
                </a>
            </li>
            <li class="menu-title">Configuration</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <span class="nav-icon">
                        <i class="bx bx-child fs-2"></i>
                    </span>
                    <span class="nav-text">User</span>
                </a>
            </li>


        </ul>
    </div>
</div>

