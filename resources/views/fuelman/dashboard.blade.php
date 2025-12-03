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
        <div class="row">
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
