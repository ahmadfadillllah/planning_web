@include('layout.head', ['title' => 'Edit KLKH Fuel Station'])
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
                    <h4 class="mb-0 fw-semibold">Edit KLKH Fuel Station</h4>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('klkh.fuelStation.update', $users['fuelStation']->UUID) }}" method="POST" id="submitFormKLKHFuelStation">
                    @csrf
                    <!-- Inputan di atas tabel -->
                    <div class="row mb-3">
                        <!-- Kolom 1: PIT dan Shift -->
                        <div class="col-md-6 col-12 px-2 py-2">
                            <label for="pit">PIT</label>
                            <select class="form-control form-control-sm pb-2" id="exampleFormControlSelect2" name="pit"
                                required>
                                <option value="{{ $users['fuelStation']->PIT_ID }}" selected>{{ $users['fuelStation']->PIT }}</option>
                                @foreach ($users['pit'] as $pit)
                                <option value="{{ $pit->ID }}">{{ $pit->KETERANGAN }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 col-12 px-2 py-2">
                            <label for="shift">Shift</label>
                            <select class="form-control form-control-sm pb-2" id="exampleFormControlSelect1"
                                name="shift" required>
                                <option value="{{ $users['fuelStation']->SHIFT_ID }}" selected>{{ $users['fuelStation']->SHIFT }}</option>
                                @foreach ($users['shift'] as $sh)
                                <option value="{{ $sh->ID }}">{{ $sh->KETERANGAN }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Kolom 2: Hari/Tanggal dan Jam -->
                        <div class="col-md-6 col-12 px-2 py-2">
                            <label for="date">Hari/ Tanggal</label>
                            <input type="date" class="form-control form-control-sm pb-2" id="date" name="date" value="{{ $users['fuelStation']->DATE }}" required>
                        </div>
                        <div class="col-md-6 col-12 px-2 py-2">
                            <label for="time">Jam</label>
                            <input type="time" class="form-control form-control-sm pb-2" id="time" name="time" value="{{ \Carbon\Carbon::parse($users['fuelStation']->TIME)->format('H:i') }}" required>
                        </div>
                    </div>
                    <hr>
                    <h4>Lokasi Kerja</h4>
                    <hr>
                    <!-- Form dengan radio button -->
                    <div class="mb-3">
                        <label for="permukaan_tanah_rata_check">1. Permukaan tanah rata dan tidak berlubang</label>
                        <div class="d-flex justify-content-start">
                            <label for="permukaan_tanah_rata_true" class="me-3 px-2 py-2">
                                <input type="radio" id="permukaan_tanah_rata_true" name="permukaan_tanah_rata_check"
                                    value="true" {{ $users['fuelStation']->PERMUKAAN_TANAH_RATA_CHECK === 'true' ? 'checked' : '' }}  required /> Ya
                            </label>
                            <label for="permukaan_tanah_rata_false" class="me-3 px-2 py-2">
                                <input type="radio" id="permukaan_tanah_rata_false" name="permukaan_tanah_rata_check"
                                    value="false" {{ $users['fuelStation']->PERMUKAAN_TANAH_RATA_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="permukaan_tanah_rata_na" class="me-3 px-2 py-2">
                                <input type="radio" id="permukaan_tanah_rata_na" name="permukaan_tanah_rata_check"
                                    value="n/a" {{ $users['fuelStation']->PERMUKAAN_TANAH_RATA_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="permukaan_tanah_rata_note" id="permukaan_tanah_rata_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->PERMUKAAN_TANAH_RATA_NOTE }}" />
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="permukaan_tanah_licin_check">2. Permukaan tanah tidak licin</label>
                        <div class="d-flex justify-content-start">
                            <label for="permukaan_tanah_licin_true" class="me-3 px-2 py-2">
                                <input type="radio" id="permukaan_tanah_licin_true" name="permukaan_tanah_licin_check"
                                    value="true" {{ $users['fuelStation']->PERMUKAAN_TANAH_LICIN_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="permukaan_tanah_licin_false" class="me-3 px-2 py-2">
                                <input type="radio" id="permukaan_tanah_licin_false" name="permukaan_tanah_licin_check"
                                    value="false" {{ $users['fuelStation']->PERMUKAAN_TANAH_LICIN_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="permukaan_tanah_licin_na" class="me-3 px-2 py-2">
                                <input type="radio" id="permukaan_tanah_licin_na" name="permukaan_tanah_licin_check"
                                    value="n/a" {{ $users['fuelStation']->PERMUKAAN_TANAH_LICIN_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="permukaan_tanah_licin_note" id="permukaan_tanah_licin_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->PERMUKAAN_TANAH_LICIN_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="lokasi_jauh_lintasan_check">3. Lokasi kerja jauh dengan lintasan aktif
                            angkutan</label>
                        <div class="d-flex justify-content-start">
                            <label for="lokasi_jauh_lintasan_true" class="me-3 px-2 py-2">
                                <input type="radio" id="lokasi_jauh_lintasan_true" name="lokasi_jauh_lintasan_check"
                                    value="true" {{ $users['fuelStation']->LOKASI_JAUH_LINTASAN_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="lokasi_jauh_lintasan_false" class="me-3 px-2 py-2">
                                <input type="radio" id="lokasi_jauh_lintasan_false" name="lokasi_jauh_lintasan_check"
                                    value="false" {{ $users['fuelStation']->LOKASI_JAUH_LINTASAN_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="lokasi_jauh_lintasan_na" class="me-3 px-2 py-2">
                                <input type="radio" id="lokasi_jauh_lintasan_na" name="lokasi_jauh_lintasan_check"
                                    value="n/a" {{ $users['fuelStation']->LOKASI_JAUH_LINTASAN_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="lokasi_jauh_lintasan_note" id="lokasi_jauh_lintasan_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->LOKASI_JAUH_LINTASAN_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="tidak_ceceran_b3_check">4. Tidak ada ceceran B3</label>
                        <div class="d-flex justify-content-start">
                            <label for="tidak_ceceran_b3_true" class="me-3 px-2 py-2">
                                <input type="radio" id="tidak_ceceran_b3_true" name="tidak_ceceran_b3_check"
                                    value="true" {{ $users['fuelStation']->TIDAK_CECERAN_B3_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="tidak_ceceran_b3_false" class="me-3 px-2 py-2">
                                <input type="radio" id="tidak_ceceran_b3_false" name="tidak_ceceran_b3_check"
                                    value="false" {{ $users['fuelStation']->TIDAK_CECERAN_B3_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="tidak_ceceran_b3_na" class="me-3 px-2 py-2">
                                <input type="radio" id="tidak_ceceran_b3_na" name="tidak_ceceran_b3_check"
                                    value="n/a" {{ $users['fuelStation']->TIDAK_CECERAN_B3_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="tidak_ceceran_b3_note" id="tidak_ceceran_b3_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->TIDAK_CECERAN_B3_NOTE }}"/>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <label for="parkir_fueltruck_check">5. Area parkir khusus Fuel Truck untuk penyetokan
                            tersedia</label>
                        <div class="d-flex justify-content-start">
                            <label for="parkir_fueltruck_true" class="me-3 px-2 py-2">
                                <input type="radio" id="parkir_fueltruck_true" name="parkir_fueltruck_check"
                                    value="true" {{ $users['fuelStation']->PARKIR_FUELTRUCK_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="parkir_fueltruck_false" class="me-3 px-2 py-2">
                                <input type="radio" id="parkir_fueltruck_false" name="parkir_fueltruck_check"
                                    value="false" {{ $users['fuelStation']->PARKIR_FUELTRUCK_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="parkir_fueltruck_na" class="me-3 px-2 py-2">
                                <input type="radio" id="parkir_fueltruck_na" name="parkir_fueltruck_check"
                                    value="n/a" {{ $users['fuelStation']->PARKIR_FUELTRUCK_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="parkir_fueltruck_note" id="parkir_fueltruck_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->PARKIR_FUELTRUCK_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="parkir_lv_check">6. Area parkir khusus untuk LV tersedia</label>
                        <div class="d-flex justify-content-start">
                            <label for="parkir_lv_true" class="me-3 px-2 py-2">
                                <input type="radio" id="parkir_lv_true" name="parkir_lv_check" value="true" {{ $users['fuelStation']->PARKIR_LV_CHECK === 'true' ? 'checked' : '' }} required />
                                Ya
                            </label>
                            <label for="parkir_lv_false" class="me-3 px-2 py-2">
                                <input type="radio" id="parkir_lv_false" name="parkir_lv_check" value="false" {{ $users['fuelStation']->PARKIR_LV_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="parkir_lv_na" class="me-3 px-2 py-2">
                                <input type="radio" id="parkir_lv_na" name="parkir_lv_check" value="n/a" {{ $users['fuelStation']->PARKIR_LV_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="parkir_lv_note" id="parkir_lv_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->PARKIR_LV_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="lampu_kerja_check">7. Semua lampu kerja menyala dengan normal dan memadai untuk
                            kerja malam hari</label>
                        <div class="d-flex justify-content-start">
                            <label for="lampu_kerja_true" class="me-3 px-2 py-2">
                                <input type="radio" id="lampu_kerja_true" name="lampu_kerja_check" value="true"
                                    {{ $users['fuelStation']->LAMPU_KERJA_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="lampu_kerja_false" class="me-3 px-2 py-2">
                                <input type="radio" id="lampu_kerja_false" name="lampu_kerja_check" value="false" {{ $users['fuelStation']->LAMPU_KERJA_CHECK === 'false' ? 'checked' : '' }}/>
                                Tidak
                            </label>
                            <label for="lampu_kerja_na" class="me-3 px-2 py-2">
                                <input type="radio" id="lampu_kerja_na" name="lampu_kerja_check" value="n/a" {{ $users['fuelStation']->LAMPU_KERJA_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="lampu_kerja_note" id="lampu_kerja_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->LAMPU_KERJA_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="fuel_genset_check">8. Sisa fuel genset >10% kapasitas tangki</label>
                        <div class="d-flex justify-content-start">
                            <label for="fuel_genset_true" class="me-3 px-2 py-2">
                                <input type="radio" id="fuel_genset_true" name="fuel_genset_check" value="true"
                                    {{ $users['fuelStation']->FUEL_GENSET_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="fuel_genset_false" class="me-3 px-2 py-2">
                                <input type="radio" id="fuel_genset_false" name="fuel_genset_check" value="false" {{ $users['fuelStation']->FUEL_GENSET_CHECK === 'false' ? 'checked' : '' }}/>
                                Tidak
                            </label>
                            <label for="fuel_genset_na" class="me-3 px-2 py-2">
                                <input type="radio" id="fuel_genset_na" name="fuel_genset_check" value="n/a" {{ $users['fuelStation']->FUEL_GENSET_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="fuel_genset_note" id="fuel_genset_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->FUEL_GENSET_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="air_bersih_tandon_check">9. Sisa air dalam tandon air bersih >30% kapasitas
                            tandon</label>
                        <div class="d-flex justify-content-start">
                            <label for="air_bersih_tandon_true" class="me-3 px-2 py-2">
                                <input type="radio" id="air_bersih_tandon_true" name="air_bersih_tandon_check"
                                    value="true" {{ $users['fuelStation']->AIR_BERSIH_TANDON_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="air_bersih_tandon_false" class="me-3 px-2 py-2">
                                <input type="radio" id="air_bersih_tandon_false" name="air_bersih_tandon_check"
                                    value="false" {{ $users['fuelStation']->AIR_BERSIH_TANDON_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="air_bersih_tandon_na" class="me-3 px-2 py-2">
                                <input type="radio" id="air_bersih_tandon_na" name="air_bersih_tandon_check"
                                    value="n/a" {{ $users['fuelStation']->AIR_BERSIH_TANDON_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="air_bersih_tandon_note" id="air_bersih_tandon_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->AIR_BERSIH_TANDON_NOTE }}"/>
                    </div>
                    <hr>
                    <h4>Perlengkapan Kerja</h4>
                    <hr>
                    <div class="mb-3">
                        <label for="sop_jsa_check">1. Tersedia SOP/ JSA untuk pekerjaan yang akan dilakukan</label>
                        <div class="d-flex justify-content-start">
                            <label for="sop_jsa_true" class="me-3 px-2 py-2">
                                <input type="radio" id="sop_jsa_true" name="sop_jsa_check" value="true" {{ $users['fuelStation']->SOP_JSA_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="sop_jsa_false" class="me-3 px-2 py-2">
                                <input type="radio" id="sop_jsa_false" name="sop_jsa_check" value="false" {{ $users['fuelStation']->SOP_JSA_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="sop_jsa_na" class="me-3 px-2 py-2">
                                <input type="radio" id="sop_jsa_na" name="sop_jsa_check" value="n/a" {{ $users['fuelStation']->SOP_JSA_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="sop_jsa_note" id="sop_jsa_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->SOP_JSA_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="safety_post_check">2. Terpasang safety post sebagai batas berhenti unit untuk
                            refueling</label>
                        <div class="d-flex justify-content-start">
                            <label for="safety_post_true" class="me-3 px-2 py-2">
                                <input type="radio" id="safety_post_true" name="safety_post_check" value="true"
                                    {{ $users['fuelStation']->SAFETY_POST_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="safety_post_false" class="me-3 px-2 py-2">
                                <input type="radio" id="safety_post_false" name="safety_post_check" value="false" {{ $users['fuelStation']->SAFETY_POST_CHECK === 'false' ? 'checked' : '' }}/>
                                Tidak
                            </label>
                            <label for="safety_post_na" class="me-3 px-2 py-2">
                                <input type="radio" id="safety_post_na" name="safety_post_check" value="n/a" {{ $users['fuelStation']->SAFETY_POST_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="safety_post_note" id="safety_post_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->SAFETY_POST_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="rambu_apd_check">3. Terpasang rambu peringatan dan rambu APD</label>
                        <div class="d-flex justify-content-start">
                            <label for="rambu_apd_true" class="me-3 px-2 py-2">
                                <input type="radio" id="rambu_apd_true" name="rambu_apd_check" value="true" {{ $users['fuelStation']->RAMBU_APD_CHECK === 'true' ? 'checked' : '' }} required />
                                Ya
                            </label>
                            <label for="rambu_apd_false" class="me-3 px-2 py-2">
                                <input type="radio" id="rambu_apd_false" name="rambu_apd_check" value="false" {{ $users['fuelStation']->RAMBU_APD_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="rambu_apd_na" class="me-3 px-2 py-2">
                                <input type="radio" id="rambu_apd_na" name="rambu_apd_check" value="n/a" {{ $users['fuelStation']->RAMBU_APD_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="rambu_apd_note" id="rambu_apd_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->RAMBU_APD_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="perlengkapan_kerja_check">4. Perlengkapan kerja ditata dengan rapi & tidak
                            berserakan</label>
                        <div class="d-flex justify-content-start">
                            <label for="perlengkapan_kerja_true" class="me-3 px-2 py-2">
                                <input type="radio" id="perlengkapan_kerja_true" name="perlengkapan_kerja_check"
                                    value="true" {{ $users['fuelStation']->PERLENGKAPAN_KERJA_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="perlengkapan_kerja_false" class="me-3 px-2 py-2">
                                <input type="radio" id="perlengkapan_kerja_false" name="perlengkapan_kerja_check"
                                    value="false" {{ $users['fuelStation']->PERLENGKAPAN_KERJA_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="perlengkapan_kerja_na" class="me-3 px-2 py-2">
                                <input type="radio" id="perlengkapan_kerja_na" name="perlengkapan_kerja_check"
                                    value="n/a" {{ $users['fuelStation']->PERLENGKAPAN_KERJA_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="perlengkapan_kerja_note" id="perlengkapan_kerja_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->PERLENGKAPAN_KERJA_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="apab_apar_check">5. Tersedia APAB dan APAR</label>
                        <div class="d-flex justify-content-start">
                            <label for="apab_apar_true" class="me-3 px-2 py-2">
                                <input type="radio" id="apab_apar_true" name="apab_apar_check" value="true" {{ $users['fuelStation']->APAB_APAR_CHECK === 'true' ? 'checked' : '' }} required />
                                Ya
                            </label>
                            <label for="apab_apar_false" class="me-3 px-2 py-2">
                                <input type="radio" id="apab_apar_false" name="apab_apar_check" value="false" {{ $users['fuelStation']->APAB_APAR_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="apab_apar_na" class="me-3 px-2 py-2">
                                <input type="radio" id="apab_apar_na" name="apab_apar_check" value="n/a" {{ $users['fuelStation']->APAB_APAR_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="apab_apar_note" id="apab_apar_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->APAB_APAR_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="p3k_eyewash_check">6. Tersedia kotak P3K dan Eyewash</label>
                        <div class="d-flex justify-content-start">
                            <label for="p3k_eyewash_true" class="me-3 px-2 py-2">
                                <input type="radio" id="p3k_eyewash_true" name="p3k_eyewash_check" value="true"
                                    {{ $users['fuelStation']->P3K_EYEWASH_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="p3k_eyewash_false" class="me-3 px-2 py-2">
                                <input type="radio" id="p3k_eyewash_false" name="p3k_eyewash_check" value="false" {{ $users['fuelStation']->P3K_EYEWASH_CHECK === 'false' ? 'checked' : '' }}/>
                                Tidak
                            </label>
                            <label for="p3k_eyewash_na" class="me-3 px-2 py-2">
                                <input type="radio" id="p3k_eyewash_na" name="p3k_eyewash_check" value="n/a" {{ $users['fuelStation']->P3K_EYEWASH_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="p3k_eyewash_note" id="p3k_eyewash_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->P3K_EYEWASH_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="inspeksi_apar_check">7. Terdapat tag inspeksi APAR dan eyewash yang sudah
                            diinspeksi</label>
                        <div class="d-flex justify-content-start">
                            <label for="inspeksi_apar_true" class="me-3 px-2 py-2">
                                <input type="radio" id="inspeksi_apar_true" name="inspeksi_apar_check" value="true"
                                    {{ $users['fuelStation']->INSPEKSI_APAR_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="inspeksi_apar_false" class="me-3 px-2 py-2">
                                <input type="radio" id="inspeksi_apar_false" name="inspeksi_apar_check" value="false" {{ $users['fuelStation']->INSPEKSI_APAR_CHECK === 'false' ? 'checked' : '' }}/>
                                Tidak
                            </label>
                            <label for="inspeksi_apar_na" class="me-3 px-2 py-2">
                                <input type="radio" id="inspeksi_apar_na" name="inspeksi_apar_check" value="n/a" {{ $users['fuelStation']->INSPEKSI_APAR_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="inspeksi_apar_note" id="inspeksi_apar_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->INSPEKSI_APAR_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="form_checklist_refueling_check">8. Tersedia form checklist peralatan
                            Refueling</label>
                        <div class="d-flex justify-content-start">
                            <label for="form_checklist_refueling_true" class="me-3 px-2 py-2">
                                <input type="radio" id="form_checklist_refueling_true"
                                    name="form_checklist_refueling_check" value="true" {{ $users['fuelStation']->FORM_CHECKLIST_REFUELING_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="form_checklist_refueling_false" class="me-3 px-2 py-2">
                                <input type="radio" id="form_checklist_refueling_false"
                                    name="form_checklist_refueling_check" value="false" {{ $users['fuelStation']->FORM_CHECKLIST_REFUELING_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="form_checklist_refueling_na" class="me-3 px-2 py-2">
                                <input type="radio" id="form_checklist_refueling_na"
                                    name="form_checklist_refueling_check" value="n/a" {{ $users['fuelStation']->FORM_CHECKLIST_REFUELING_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="form_checklist_refueling_note" id="form_checklist_refueling_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->FORM_CHECKLIST_REFUELING_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="tempat_sampah_check">9. Tersedia tiga wadah / tempat penampung sampah</label>
                        <div class="d-flex justify-content-start">
                            <label for="tempat_sampah_true" class="me-3 px-2 py-2">
                                <input type="radio" id="tempat_sampah_true" name="tempat_sampah_check" value="true"
                                    {{ $users['fuelStation']->TEMPAT_SAMPAH_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="tempat_sampah_false" class="me-3 px-2 py-2">
                                <input type="radio" id="tempat_sampah_false" name="tempat_sampah_check" value="false" {{ $users['fuelStation']->TEMPAT_SAMPAH_CHECK === 'false' ? 'checked' : '' }}/>
                                Tidak
                            </label>
                            <label for="tempat_sampah_na" class="me-3 px-2 py-2">
                                <input type="radio" id="tempat_sampah_na" name="tempat_sampah_check" value="n/a" {{ $users['fuelStation']->TEMPAT_SAMPAH_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="tempat_sampah_note" id="tempat_sampah_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->TEMPAT_SAMPAH_NOTE }}"/>
                    </div>

                    <h4>Kegiatan Refueling Unit A2B</h4>
                    <hr>
                    <div class="mb-3">
                        <label for="minepermit_check">1. Fuelman memiliki dan membawa minepermit sebagai izin
                            kerja</label>
                        <div class="d-flex justify-content-start">
                            <label for="minepermit_true" class="me-3 px-2 py-2">
                                <input type="radio" id="minepermit_true" name="minepermit_check" value="true"
                                    {{ $users['fuelStation']->MINEPERMIT_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="minepermit_false" class="me-3 px-2 py-2">
                                <input type="radio" id="minepermit_false" name="minepermit_check" value="false" {{ $users['fuelStation']->MINEPERMIT_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="minepermit_na" class="me-3 px-2 py-2">
                                <input type="radio" id="minepermit_na" name="minepermit_check" value="n/a" {{ $users['fuelStation']->MINEPERMIT_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="minepermit_note" id="minepermit_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->MINEPERMIT_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="simper_operator_check">2. Operator Fuel Truck memiliki dan membawa SIMPER sesuai
                            peralatan yang digunakan</label>
                        <div class="d-flex justify-content-start">
                            <label for="simper_operator_true" class="me-3 px-2 py-2">
                                <input type="radio" id="simper_operator_true" name="simper_operator_check" value="true"
                                    {{ $users['fuelStation']->SIMPER_OPERATOR_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="simper_operator_false" class="me-3 px-2 py-2">
                                <input type="radio" id="simper_operator_false" name="simper_operator_check"
                                    value="false" {{ $users['fuelStation']->SIMPER_OPERATOR_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="simper_operator_na" class="me-3 px-2 py-2">
                                <input type="radio" id="simper_operator_na" name="simper_operator_check" value="n/a" {{ $users['fuelStation']->SIMPER_OPERATOR_CHECK === 'n/a' ? 'checked' : '' }}/>
                                N/A
                            </label>
                        </div>
                        <input type="text" name="simper_operator_note" id="simper_operator_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->SIMPER_OPERATOR_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="padlock_check">3. Tersedia Padlock untuk kegiatan refueling</label>
                        <div class="d-flex justify-content-start">
                            <label for="padlock_true" class="me-3 px-2 py-2">
                                <input type="radio" id="padlock_true" name="padlock_check" value="true" {{ $users['fuelStation']->PADLOCK_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="padlock_false" class="me-3 px-2 py-2">
                                <input type="radio" id="padlock_false" name="padlock_check" value="false" {{ $users['fuelStation']->PADLOCK_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="padlock_na" class="me-3 px-2 py-2">
                                <input type="radio" id="padlock_na" name="padlock_check" value="n/a" {{ $users['fuelStation']->PADLOCK_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="padlock_note" id="padlock_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->PADLOCK_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="wadah_penampung_check">4. Tersedia wadah penampung untuk kegiatan Refueling</label>
                        <div class="d-flex justify-content-start">
                            <label for="wadah_penampung_true" class="me-3 px-2 py-2">
                                <input type="radio" id="wadah_penampung_true" name="wadah_penampung_check" value="true"
                                    {{ $users['fuelStation']->WADAH_PENAMPUNG_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="wadah_penampung_false" class="me-3 px-2 py-2">
                                <input type="radio" id="wadah_penampung_false" name="wadah_penampung_check"
                                    value="false" {{ $users['fuelStation']->WADAH_PENAMPUNG_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="wadah_penampung_na" class="me-3 px-2 py-2">
                                <input type="radio" id="wadah_penampung_na" name="wadah_penampung_check" value="n/a" {{ $users['fuelStation']->WADAH_PENAMPUNG_CHECK === 'n/a' ? 'checked' : '' }}/>
                                N/A
                            </label>
                        </div>
                        <input type="text" name="wadah_penampung_note" id="wadah_penampung_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->WADAH_PENAMPUNG_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="wheel_chock_check">5. Tersedia ganjal / Wheel Chock</label>
                        <div class="d-flex justify-content-start">
                            <label for="wheel_chock_true" class="me-3 px-2 py-2">
                                <input type="radio" id="wheel_chock_true" name="wheel_chock_check" value="true"
                                    {{ $users['fuelStation']->WHEEL_CHOCK_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="wheel_chock_false" class="me-3 px-2 py-2">
                                <input type="radio" id="wheel_chock_false" name="wheel_chock_check" value="false" {{ $users['fuelStation']->WHEEL_CHOCK_CHECK === 'false' ? 'checked' : '' }}/>
                                Tidak
                            </label>
                            <label for="wheel_chock_na" class="me-3 px-2 py-2">
                                <input type="radio" id="wheel_chock_na" name="wheel_chock_check" value="n/a" {{ $users['fuelStation']->WHEEL_CHOCK_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="wheel_chock_note" id="wheel_chock_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->WHEEL_CHOCK_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="radio_komunikasi_check">6. Tersedia Radio Komunikasi</label>
                        <div class="d-flex justify-content-start">
                            <label for="radio_komunikasi_true" class="me-3 px-2 py-2">
                                <input type="radio" id="radio_komunikasi_true" name="radio_komunikasi_check"
                                    value="true" {{ $users['fuelStation']->RADIO_KOMUNIKASI_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="radio_komunikasi_false" class="me-3 px-2 py-2">
                                <input type="radio" id="radio_komunikasi_false" name="radio_komunikasi_check"
                                    value="false" {{ $users['fuelStation']->RADIO_KOMUNIKASI_CHECK === 'false' ? 'checked' : '' }}/> Tidak
                            </label>
                            <label for="radio_komunikasi_na" class="me-3 px-2 py-2">
                                <input type="radio" id="radio_komunikasi_na" name="radio_komunikasi_check"
                                    value="n/a" {{ $users['fuelStation']->RADIO_KOMUNIKASI_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="radio_komunikasi_note" id="radio_komunikasi_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->RADIO_KOMUNIKASI_NOTE }}"/>
                    </div>
                    <hr>

                    <div class="mb-3">
                        <label for="apd_standar_check">7. Pekerja memakai APD standar dan APD tambahan jika
                            diperlukan</label>
                        <div class="d-flex justify-content-start">
                            <label for="apd_standar_true" class="me-3 px-2 py-2">
                                <input type="radio" id="apd_standar_true" name="apd_standar_check" value="true"
                                    {{ $users['fuelStation']->APD_STANDAR_CHECK === 'true' ? 'checked' : '' }} required /> Ya
                            </label>
                            <label for="apd_standar_false" class="me-3 px-2 py-2">
                                <input type="radio" id="apd_standar_false" name="apd_standar_check" value="false" {{ $users['fuelStation']->APD_STANDAR_CHECK === 'false' ? 'checked' : '' }}/>
                                Tidak
                            </label>
                            <label for="apd_standar_na" class="me-3 px-2 py-2">
                                <input type="radio" id="apd_standar_na" name="apd_standar_check" value="n/a" {{ $users['fuelStation']->APD_STANDAR_CHECK === 'n/a' ? 'checked' : '' }}/> N/A
                            </label>
                        </div>
                        <input type="text" name="apd_standar_note" id="apd_standar_note"
                            class="form-control form-control-sm pb-2 mt-2" placeholder="Keterangan" value="{{ $users['fuelStation']->APD_STANDAR_NOTE }}"/>
                    </div>


                    <hr>



                    <!-- Catatan -->
                    <div class="form-group mt-3">
                        <label for="notes">Catatan:</label>
                        <textarea id="notes" name="additional_notes" class="form-control form-control-sm pb-2" rows="3"
                            placeholder="Tambahkan catatan...">{{ $users['fuelStation']->ADDITIONAL_NOTES }}</textarea>
                    </div>

                    <hr>
                    <div class="row mb-3">
                        <!-- Kolom 1: PIT dan Shift -->
                        <div class="col-md-6 col-12 px-2 py-2">
                            <label for="diketahui">Diketahui</label>
                            <select class="form-control form-control-sm pb-2" id="exampleFormControlSelect1"
                                name="diketahui">
                                <option value="{{ $users['fuelStation']->DIKETAHUI }}" selected>{{ $users['fuelStation']->NAMA_DIKETAHUI }}</option>
                                @foreach ($users['diketahui'] as $si)
                                    <option value="{{ $si->nik }}">{{ $si->name }} ({{ $si->role }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary btn-sm"
                            id="submitButtonKLKHFuelStation">Update</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>
@include('layout.footer')
<script>
    window.onload = function() {
        var currentDate = new Date();

        var dd = ("0" + currentDate.getDate()).slice(-2);
        var mm = ("0" + (currentDate.getMonth() + 1)).slice(-2);
        var yyyy = currentDate.getFullYear();
        var formattedDate = yyyy + "-" + mm + "-" + dd;

        var hours = ("0" + currentDate.getHours()).slice(-2);
        var minutes = ("0" + currentDate.getMinutes()).slice(-2);
        var formattedTime = hours + ":" + minutes;
    }
    document.querySelector("form").addEventListener("submit", function(e) {
        const radioGroups = Array.from(new Set([...document.querySelectorAll("input[type='radio']")].map(r => r
            .name)));
        const incompleteGroups = radioGroups.filter(groupName => {
            return !document.querySelector(`input[name="${groupName}"]:checked`);
        });

        if (incompleteGroups.length > 0) {
            e.preventDefault();
            alert("Silakan isi semua pilihan True/False/N/A sebelum mengirimkan form!");
        }
    });
</script>
