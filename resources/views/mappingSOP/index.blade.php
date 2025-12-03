@include('layout.head', ['title' => 'Mapping SOP'])
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
       <div class="row align-items-center mb-3">
            <div class="col">
                <h4 class="fw-semibold mb-0">Mapping SOP</h4>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" style="padding-top:10px;padding-bottom:10px;" data-bs-toggle="modal" data-bs-target="#insertSOP">Tambah</button>
            </div>
        </div>
        @include('mappingSOP.modal.insert')

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table id="cbtn-selectors" class="table table-striped table-hover table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>No. Urut</th>
                                <th>Nama</th>
                                <th>File</th>
                                <th>Aktif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $ms)
                            <tr>
                                <td>{{ $ms->NO_URUT }}</td>
                                <td>{{ $ms->NAME }}</td>
                                <td>
                                    <a href="{{ asset('sop/' . $ms->FILE) }}" target="_blank">
                                        <span class="badge bg-info">Lihat</span>
                                    </a>
                                </td>
                                <td>
                                    @if ($ms->STATUSENABLED == true)
                                    <span class="text-success">Aktif</span>
                                    @else
                                    <span class="text-danger">Non Aktif</span>
                                    @endif
                                </td>

                                <td class="text-left f-w-600">
                                    @if ($ms->STATUSENABLED == true)
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#statusEnabled{{ $ms->ID }}"><span
                                            class="badge bg-danger">Nonaktifkan</span></a>
                                    @else
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#statusEnabled{{ $ms->ID }}"><span
                                            class="badge bg-success">Aktifkan</span></a>
                                    @endif
                                </td>
                            </tr>
                            @include('mappingSOP.modal.statusEnabled')
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

    $('#cbtn-selectors').DataTable({
        dom: 'Bfrtip',
        pageLength: 20,
    });

    // [ Excel - Cell Background ]
    $('#excel-bg').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                $('row c[r^="Fs"]', sheet).each(function () {
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
