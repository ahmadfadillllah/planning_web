<div class="modal fade" id="verifiedDiketahui{{ $fuelStation->UUID }}" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <i class="bx bx-error-circle text-success shake-ikon" style="font-size: 100px;"></i>
                <div class="mt-4 pt-4">
                    <h4>Verifikasi KLKH?</h4>
                    <p class="text-muted"> Lakukan verifikasi KLKH ini...</p>
                    <!-- Toogle to second dialog -->
                    <a href="{{ route('klkh.fuelStation.verifiedDiketahui', $fuelStation->UUID) }}" type="button"  class="btn btn-danger">Verifikasi</a>
                </div>
            </div>
        </div>
    </div>
</div>
