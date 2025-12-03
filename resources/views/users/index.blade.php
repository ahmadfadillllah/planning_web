@include('layout.head', ['title' => 'Setting Users'])
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
                    <h4 class="mb-3 fw-semibold">Configuration Users</h4>
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
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Aktif</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $us)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $us->nik }}</td>
                                <td>{{ $us->name }}</td>
                                <td>
                                    @if ($us->statusenabled == true)
                                    <span class="text-success">Aktif</span>
                                    @else
                                    <span class="text-danger">Non Aktif</span>
                                    @endif
                                </td>
                                <td>{{ $us->role }}</td>

                                <td class="text-left f-w-600">
                                    @if ($us->statusenabled == true)
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#statusEnabled{{ $us->id }}"><span
                                            class="badge bg-danger">Nonaktifkan</span></a>
                                    @else
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#statusEnabled{{ $us->id }}"><span
                                            class="badge bg-success">Aktifkan</span></a>
                                    @endif
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#changeRole{{ $us->id }}"><span
                                            class="badge bg-info">Ganti Role</span></a>
                                </td>
                            </tr>
                            @include('users.modal.changeRole')
                            @include('users.modal.statusEnabled')
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
    // [ HTML5 Export Buttons ]
    $('#basic-btn').DataTable({
        dom: 'Bfrtip',
    });

    // [ Column Selectors ]
    $('#cbtn-selectors').DataTable({
        dom: 'Bfrtip',
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
