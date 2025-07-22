<div class="modal fade" id="statusEnabled{{ $dt->ID }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <i class="bx bx-error-circle text-warning shake-ikon" style="font-size: 100px;"></i>
                <div class="mt-4 pt-4">
                    <h4>Yakin mengubah status user ini?</h4>
                    <!-- Toogle to second dialog -->
                    <a href="{{ route('mappingVerifier.statusEnabled', $dt->ID) }}" type="button"><span class="badge bg-warning" style="font-size:14px">Ubah</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
