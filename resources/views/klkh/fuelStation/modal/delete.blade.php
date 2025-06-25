<div class="modal fade" id="deleteKLKH{{ $item->ID }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <i class="bx bx-trash text-warning shake-ikon" style="font-size: 100px;"></i>
                <div class="mt-4 pt-4">
                    <h4>Yakin menghapus KLKH ini?</h4>
                    <p class="text-muted"> Data yang dihapus tidak ditampilkan kembali</p>
                    <!-- Toogle to second dialog -->
                    <a href="{{ route('klkh.fuelStation.delete', $item->ID) }}" type="button"  class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>
