@include('layout.head', ['title' => '06. Pencatatan System Fuel Management'])
@include('layout.header')
@include('layout.theme_settings')
@include('layout.sidebar')
<style>
    @media (max-width: 767.98px) {
        .dt-buttons {
            display: none !important;
        }
    }

</style>
<div class="page-content">

    <!-- Start Container Fluid -->
    <div class="container-fluid">

        <!-- ========== Page Title Start ========== -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="mb-3 fw-semibold">06. Pencatatan System Fuel Management</h4>

                    <!-- Kontainer baris horizontal -->
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">


                        <!-- Grup tengah: DataTable buttons (ditempel lewat JS) -->
                        <div id="datatable-buttons-container" class="d-flex gap-2 flex-wrap"></div>

                        <a href="{{ asset('sop/'. $name) }}" class="btn btn-primary" target="_blank">
                            <i class="bx bx-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div style="height:90vh">
                    <iframe id="pdfViewer" width="100%" height="100%" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    (function () {
    const base = "{{ url('/pdfjs/web/viewer.html') }}?file={{ urlencode($pdfUrl) }}";

    function setSrc() {
        const isMobile = window.matchMedia('(max-width: 768px)').matches ||
                        /android|iphone|ipad|ipod/i.test(navigator.userAgent);
        const zoom = isMobile ? 'page-width' : 'page-fit';
        document.getElementById('pdfViewer').src = base + '#zoom=' + zoom + '&page=1';
    }

    setSrc();

    let t;
    window.addEventListener('resize', () => { clearTimeout(t); t = setTimeout(setSrc, 200); });
    })();
</script>
@include('layout.footer')

