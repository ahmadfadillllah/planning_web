@include('layout.head', ['title' => 'Temuan KLKH Fuel Station'])
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
                    <h4 class="mb-3 fw-semibold">Report KLKH Fuel Station</h4>

                    <!-- Kontainer baris horizontal -->
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">

                        <!-- Grup kiri: Datepicker + Tampilkan -->
                        <form action="" method="get">
                            <div class="d-flex align-items-center gap-2 flex-wrap">
                            <input type="text" id="range-datepicker" class="form-control"
                                style="width: 230px;" placeholder="" name="rangeDate">
                            <button type="submit" id="btn-tampilkan" class="btn btn-info">
                                <i class="bx bx-search"></i> Tampilkan
                            </button>
                        </div>
                        </form>

                        <!-- Grup tengah: DataTable buttons (ditempel lewat JS) -->
                        <div id="datatable-buttons-container" class="d-flex gap-2 flex-wrap"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table id="cbtn-selectors" class="table table-striped table-hover table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>DATE</th>
                                <th>TIME</th>
                                <th>PIT</th>
                                <th>SHIFT</th>
                                <th>FIELD</th>
                                <th>VALUE</th>
                                <th>NOTES</th>
                                <th>PIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($report as $rp)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('Y-m-d', strtotime($rp->DATE)) }}</td>
                                <td>{{ date('H:i', strtotime($rp->TIME)) }}</td>
                                <td>{{ $rp->PIT }}</td>
                                <td>{{ $rp->SHIFT }}</td>
                                <td>{{ $rp->FIELD }}</td>
                                <td>
                                    @if ($rp->VALUE == 'true')
                                        Ya
                                    @elseif ($rp->VALUE == 'false')
                                        Tidak
                                    @else
                                        N/A
                                    @endif
                            </td>
                                <td>{{ $rp->NOTES }}</td>
                                <td>{{ $rp->NAMA_PIC }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@include('layout.footer')
<script>
    document.getElementById('range-datepicker').flatpickr({
        mode: "range"
    });
    document.addEventListener('DOMContentLoaded', function () {
        const urlParams = new URLSearchParams(window.location.search);
        const rangeDate = urlParams.get('rangeDate');

        const rangeInput = document.getElementById('range-datepicker');

        if (rangeDate) {
            rangeInput.value = rangeDate;
        } else {
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            const formatted = `${yyyy}-${mm}-${dd} to ${yyyy}-${mm}-${dd}`;
            rangeInput.placeholder = formatted;
        }
    });
    // [ HTML5 Export Buttons ]
    $('#basic-btn').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'print']
    });

    // [ Column Selectors ]
    $('#cbtn-selectors').DataTable({
        dom: 'Bfrtip',
        buttons: [{
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                },
                customize: function (doc) {
                    doc.content[1].margin = [10, 10, 10, 10];
                }
            },
            'colvis'
        ]
    });

    // [ Excel - Cell Background ]
    $('#excel-bg').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="F"]', sheet).each(function () {
                    if ($('is t', this).text().replace(/[^\d]/g, '') * 1 >= 500000) {
                        $(this).attr('s', '20');
                    }
                });
            }
        }]
    });

    // [ Custom File (JSON) ]
    $('#pdf-json').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            text: 'JSON',
            action: function (e, dt, button, config) {
                var data = dt.buttons.exportData();
                $.fn.dataTable.fileSave(new Blob([JSON.stringify(data)]), 'Export.json');
            }
        }]
    });

</script>
