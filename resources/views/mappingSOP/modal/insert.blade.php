<div class="modal fade" id="insertSOP" tabindex="-1" aria-labelledby="modalSupportLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSupportLabel">Tambah SOP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('mappingSOP.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="no_urut" class="form-label">No Urut</label>
                        <input type="number" id="no_urut" name="no_urut" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" id="nama" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="file" id="file" name="file" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Status Enabled</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statusenabled" id="statusTrue" value="true" checked>
                            <label class="form-check-label" for="statusTrue">True</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statusenabled" id="statusFalse" value="false">
                            <label class="form-check-label" for="statusFalse">False</label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
