<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <script>
                    document.write(new Date().getFullYear())

                </script> &copy; {{ config('app.name') }}. Copyright by <a href="http://ahmadfadillah.my.id"
                    class="fw-bold footer-text" target="_blank">IT-SIMS</a>
            </div>
        </div>
    </div>
</footer>

</div>

<!-- Vendor Javascript (Require in all Page) -->
<script src="{{ asset('app') }}/assets/js/vendor.js"></script>

<!-- App Javascript (Require in all Page) -->
<script src="{{ asset('app') }}/assets/js/app.js"></script>

<!-- Gridjs Plugin js -->
{{-- <script src="{{ asset('app') }}/assets/vendor/gridjs/gridjs.umd.js"></script> --}}

<script src="{{ asset('app') }}/assets/cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('app') }}/assets/js/plugins/dataTables.min.js"></script>
<script src="{{ asset('app') }}/assets/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('app') }}/assets/js/plugins/buttons.colVis.min.js"></script>
<script src="{{ asset('app') }}/assets/js/plugins/buttons.print.min.js"></script>
<script src="{{ asset('app') }}/assets/js/plugins/pdfmake.min.js"></script>
<script src="{{ asset('app') }}/assets/js/plugins/jszip.min.js"></script>
<script src="{{ asset('app') }}/assets/js/plugins/dataTables.buttons.min.js"></script>
<script src="{{ asset('app') }}/assets/js/plugins/vfs_fonts.js"></script>
<script src="{{ asset('app') }}/assets/js/plugins/buttons.html5.min.js"></script>
<script src="{{ asset('app') }}/assets/js/plugins/buttons.bootstrap5.min.js"></script>

    <!-- Gridjs Demo js -->
<script src="{{ asset('app') }}/assets/js/components/table-gridjs.js"></script>

<!-- Vector Map Js -->
<script src="{{ asset('app') }}/assets/vendor/jsvectormap/js/jsvectormap.min.js"></script>
<script src="{{ asset('app') }}/assets/vendor/jsvectormap/maps/world-merc.js"></script>
<script src="{{ asset('app') }}/assets/vendor/jsvectormap/maps/world.js"></script>

<!-- Dashboard Js -->
<script src="{{ asset('app') }}/assets/js/pages/dashboard-analytics.js"></script>

<!-- Flatepicker Demo Js -->
<script src="{{ asset('app') }}/assets/js/components/form-flatepicker.js"></script>

<!-- SweetAlert Demo js -->
{{-- <script src="{{ asset('app') }}/assets/js/components/extended-sweetalert.js"></script> --}}

</body>

</html>
