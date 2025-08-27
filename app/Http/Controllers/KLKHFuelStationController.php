<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Area;
use App\Models\KLKHFuelStation;
use App\Models\Shift;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Uuid;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class KLKHFuelStationController extends Controller
{
    //
    public function index(Request $request)
    {
        session(['requestTimeFuelStation' => $request->all()]);

        $tanggalInput = $request->input('rangeDate');

        $startDate = Carbon::now()->toDateString();
        $endDate = $startDate;

        if ($tanggalInput) {
            if (str_contains($tanggalInput, 'to')) {
                [$startDate, $endDate] = array_map('trim', explode('to', $tanggalInput));
            } else {
                $startDate = trim($tanggalInput);
                $endDate = $startDate;
            }
        }



        $fuelStation = DB::table('KLKH_FUEL_STATION as fs')
        ->leftJoin('users as us1', 'fs.PIC', '=', 'us1.nik')

        ->leftJoin('REF_AREA as ar', 'fs.PIT_ID', '=', 'ar.id')
        ->leftJoin('REF_SHIFT as sh', 'fs.SHIFT_ID', '=', 'sh.id')
        ->leftJoin('users as us2', 'fs.PENGAWAS', '=', 'us2.nik')
        ->leftJoin('users as us3', 'fs.DIKETAHUI', '=', 'us3.nik')
        ->select(
            'fs.ID',
            'fs.UUID',
            'fs.PIC as NIK_PIC',
            'us1.name as NAMA_PIC',
            DB::raw('CONVERT(varchar, fs.CREATED_AT, 120) as TANGGAL_PEMBUATAN'),
            'fs.STATUSENABLED',
            'ar.KETERANGAN as PIT',
            'sh.KETERANGAN as SHIFT',
            'fs.PENGAWAS as NIK_PENGAWAS',
            'fs.VERIFIED_PENGAWAS as VERIFIED_PENGAWAS',
            'fs.VERIFIED_DATETIME_PENGAWAS as VERIFIED_DATETIME_PENGAWAS',
            'fs.CATATAN_VERIFIED_PENGAWAS as CATATAN_VERIFIED_PENGAWAS',
            'us2.name as NAMA_PENGAWAS',
            'fs.DIKETAHUI as NIK_DIKETAHUI',
            'fs.VERIFIED_DIKETAHUI as VERIFIED_DIKETAHUI',
            'fs.VERIFIED_DATETIME_DIKETAHUI as VERIFIED_DATETIME_DIKETAHUI',
            'fs.CATATAN_VERIFIED_DIKETAHUI as CATATAN_VERIFIED_DIKETAHUI',
            'us3.name as NAMA_DIKETAHUI',
            'fs.DATE',
            'fs.TIME',
        )
        ->where('fs.STATUSENABLED', true)
        ->whereBetween(DB::raw('CONVERT(varchar, fs.DATE, 23)'), [$startDate, $endDate]);

        if (in_array(Auth::user()->role, ['FUELMAN', 'OPERATOR'])) {
            $fuelStation->whereRaw('1 = 0');
        }

        $fuelStation = $fuelStation->get();

        return view('klkh.fuelStation.index', compact('fuelStation'));
    }

    public function insert()
    {
        $pit = Area::where('statusenabled', true)->get();
        $shift = Shift::where('statusenabled', true)->get();

        $diketahui = DB::table('CONF_MAPPING_VERIFIER as mf')
        ->leftJoin('users as us', 'mf.USER_ID', 'us.id')
        ->select(
            'mf.STATUSENABLED',
            'mf.id as ID',
            'us.nik as nik',
            'us.name',
            'us.role'
        )->where('mf.STATUSENABLED', true)->get();


        $users = [
            // 'supervisor' => $supervisor,
            'diketahui' => $diketahui,
            'pit' => $pit,
            'shift' => $shift,
        ];
        return view('klkh.fuelStation.insert', compact('users'));
    }

    public function post(Request $request)
    {
        // dd($request->all());
        try {

            $data = $request->all();

            $dataToInsert = [
                'PIC' => Auth::user()->nik,
                'UUID' => (string) Uuid::uuid4()->toString(),
                'STATUSENABLED' => true,
                'PIT_ID' => $data['pit'],
                'SHIFT_ID' => $data['shift'],
                'DATE' => $data['date'],
                'TIME' => $data['time'],
                'PERMUKAAN_TANAH_RATA_CHECK' => $data['permukaan_tanah_rata_check'],
                'PERMUKAAN_TANAH_RATA_NOTE' => $data['permukaan_tanah_rata_note'] ?? null,
                'PERMUKAAN_TANAH_LICIN_CHECK' => $data['permukaan_tanah_licin_check'],
                'PERMUKAAN_TANAH_LICIN_NOTE' => $data['permukaan_tanah_licin_note'] ?? null,
                'LOKASI_JAUH_LINTASAN_CHECK' => $data['lokasi_jauh_lintasan_check'],
                'LOKASI_JAUH_LINTASAN_NOTE' => $data['lokasi_jauh_lintasan_note'] ?? null,
                'TIDAK_CECERAN_B3_CHECK' => $data['tidak_ceceran_b3_check'],
                'TIDAK_CECERAN_B3_NOTE' => $data['tidak_ceceran_b3_note'] ?? null,
                'PARKIR_FUELTRUCK_CHECK' => $data['parkir_fueltruck_check'],
                'PARKIR_FUELTRUCK_NOTE' => $data['parkir_fueltruck_note'] ?? null,
                'PARKIR_LV_CHECK' => $data['parkir_lv_check'],
                'PARKIR_LV_NOTE' => $data['parkir_lv_note'] ?? null,
                'LAMPU_KERJA_CHECK' => $data['lampu_kerja_check'],
                'LAMPU_KERJA_NOTE' => $data['lampu_kerja_note'] ?? null,
                'FUEL_GENSET_CHECK' => $data['fuel_genset_check'],
                'FUEL_GENSET_NOTE' => $data['fuel_genset_note'] ?? null,
                'AIR_BERSIH_TANDON_CHECK' => $data['air_bersih_tandon_check'],
                'AIR_BERSIH_TANDON_NOTE' => $data['air_bersih_tandon_note'] ?? null,
                'SOP_JSA_CHECK' => $data['sop_jsa_check'],
                'SOP_JSA_NOTE' => $data['sop_jsa_note'] ?? null,
                'SAFETY_POST_CHECK' => $data['safety_post_check'],
                'SAFETY_POST_NOTE' => $data['safety_post_note'] ?? null,
                'RAMBU_APD_CHECK' => $data['rambu_apd_check'],
                'RAMBU_APD_NOTE' => $data['rambu_apd_note'] ?? null,
                'PERLENGKAPAN_KERJA_CHECK' => $data['perlengkapan_kerja_check'],
                'PERLENGKAPAN_KERJA_NOTE' => $data['perlengkapan_kerja_note'] ?? null,
                'APAB_APAR_CHECK' => $data['apab_apar_check'],
                'APAB_APAR_NOTE' => $data['apab_apar_note'] ?? null,
                'P3K_EYEWASH_CHECK' => $data['p3k_eyewash_check'],
                'P3K_EYEWASH_NOTE' => $data['p3k_eyewash_note'] ?? null,
                'INSPEKSI_APAR_CHECK' => $data['inspeksi_apar_check'],
                'INSPEKSI_APAR_NOTE' => $data['inspeksi_apar_note'] ?? null,
                'FORM_CHECKLIST_REFUELING_CHECK' => $data['form_checklist_refueling_check'],
                'FORM_CHECKLIST_REFUELING_NOTE' => $data['form_checklist_refueling_note'] ?? null,
                'TEMPAT_SAMPAH_CHECK' => $data['tempat_sampah_check'],
                'TEMPAT_SAMPAH_NOTE' => $data['tempat_sampah_note'] ?? null,
                'MINEPERMIT_CHECK' => $data['minepermit_check'],
                'MINEPERMIT_NOTE' => $data['minepermit_note'] ?? null,
                'SIMPER_OPERATOR_CHECK' => $data['simper_operator_check'],
                'SIMPER_OPERATOR_NOTE' => $data['simper_operator_note'] ?? null,
                'PADLOCK_CHECK' => $data['padlock_check'],
                'PADLOCK_NOTE' => $data['padlock_note'] ?? null,
                'WADAH_PENAMPUNG_CHECK' => $data['wadah_penampung_check'],
                'WADAH_PENAMPUNG_NOTE' => $data['wadah_penampung_note'] ?? null,
                'WHEEL_CHOCK_CHECK' => $data['wheel_chock_check'],
                'WHEEL_CHOCK_NOTE' => $data['wheel_chock_note'] ?? null,
                'RADIO_KOMUNIKASI_CHECK' => $data['radio_komunikasi_check'],
                'RADIO_KOMUNIKASI_NOTE' => $data['radio_komunikasi_note'] ?? null,
                'APD_STANDAR_CHECK' => $data['apd_standar_check'],
                'APD_STANDAR_NOTE' => $data['apd_standar_note'] ?? null,
                'ADDITIONAL_NOTES' => $data['additional_notes'] ?? null,
                'DIKETAHUI' => $data['diketahui'] ?? null,
                'PENGAWAS' => Auth::user()->nik,
                'VERIFIED_DATETIME_PENGAWAS' => Carbon::now(),
                'VERIFIED_PENGAWAS' => Auth::user()->nik,
            ];

            // if (Auth::user()->role == 'FOREMAN' || Auth::user()->role == 'SUPERVISOR') {
            //     $dataToInsert['PENGAWAS'] = Auth::user()->nik;
            //     $dataToInsert['VERIFIED_DATETIME_PENGAWAS'] = Carbon::now();
            //     $dataToInsert['VERIFIED_PENGAWAS'] = Auth::user()->nik;
            // }


            KLKHFuelStation::create($dataToInsert);

            Activity::create([
                'STATUSENABLED' => true,
                'TANGGAL' => Carbon::now(),
                'JENIS' => 'KLKH',
                'NAMA' => Auth::user()->name,
                'NIK' => Auth::user()->nik,
                'KETERANGAN' => 'Telah menambahkan KLKH Fuel Station',
            ]);

            return redirect()->route('klkh.fuelStation.index')->with('success', 'KLKH Fuel Station berhasil dibuat');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', nl2br('KLKH Fuel Station gagal dibuat..\n' . $th->getMessage()));
        }

    }

    public function update(Request $request, $uuid)
    {
        // dd($request->all());
        $klkh = KLKHFuelStation::where('UUID', $uuid)->first();

        if($klkh->VERIFIED_DIKETAHUI){
            return redirect()->route('klkh.fuelStation.index')->with('info', 'KLKH sudah diverifikasi, pengeditan tidak diperbolehkan!');
        }

        try {

            $data = $request->all();

            $dataToUpdate = [
                'PIC' => Auth::user()->nik,
                'STATUSENABLED' => true,
                'PIT_ID' => $data['pit'],
                'SHIFT_ID' => $data['shift'],
                'DATE' => $data['date'],
                'TIME' => $data['time'],
                'PERMUKAAN_TANAH_RATA_CHECK' => $data['permukaan_tanah_rata_check'],
                'PERMUKAAN_TANAH_RATA_NOTE' => $data['permukaan_tanah_rata_note'] ?? null,
                'PERMUKAAN_TANAH_LICIN_CHECK' => $data['permukaan_tanah_licin_check'],
                'PERMUKAAN_TANAH_LICIN_NOTE' => $data['permukaan_tanah_licin_note'] ?? null,
                'LOKASI_JAUH_LINTASAN_CHECK' => $data['lokasi_jauh_lintasan_check'],
                'LOKASI_JAUH_LINTASAN_NOTE' => $data['lokasi_jauh_lintasan_note'] ?? null,
                'TIDAK_CECERAN_B3_CHECK' => $data['tidak_ceceran_b3_check'],
                'TIDAK_CECERAN_B3_NOTE' => $data['tidak_ceceran_b3_note'] ?? null,
                'PARKIR_FUELTRUCK_CHECK' => $data['parkir_fueltruck_check'],
                'PARKIR_FUELTRUCK_NOTE' => $data['parkir_fueltruck_note'] ?? null,
                'PARKIR_LV_CHECK' => $data['parkir_lv_check'],
                'PARKIR_LV_NOTE' => $data['parkir_lv_note'] ?? null,
                'LAMPU_KERJA_CHECK' => $data['lampu_kerja_check'],
                'LAMPU_KERJA_NOTE' => $data['lampu_kerja_note'] ?? null,
                'FUEL_GENSET_CHECK' => $data['fuel_genset_check'],
                'FUEL_GENSET_NOTE' => $data['fuel_genset_note'] ?? null,
                'AIR_BERSIH_TANDON_CHECK' => $data['air_bersih_tandon_check'],
                'AIR_BERSIH_TANDON_NOTE' => $data['air_bersih_tandon_note'] ?? null,
                'SOP_JSA_CHECK' => $data['sop_jsa_check'],
                'SOP_JSA_NOTE' => $data['sop_jsa_note'] ?? null,
                'SAFETY_POST_CHECK' => $data['safety_post_check'],
                'SAFETY_POST_NOTE' => $data['safety_post_note'] ?? null,
                'RAMBU_APD_CHECK' => $data['rambu_apd_check'],
                'RAMBU_APD_NOTE' => $data['rambu_apd_note'] ?? null,
                'PERLENGKAPAN_KERJA_CHECK' => $data['perlengkapan_kerja_check'],
                'PERLENGKAPAN_KERJA_NOTE' => $data['perlengkapan_kerja_note'] ?? null,
                'APAB_APAR_CHECK' => $data['apab_apar_check'],
                'APAB_APAR_NOTE' => $data['apab_apar_note'] ?? null,
                'P3K_EYEWASH_CHECK' => $data['p3k_eyewash_check'],
                'P3K_EYEWASH_NOTE' => $data['p3k_eyewash_note'] ?? null,
                'INSPEKSI_APAR_CHECK' => $data['inspeksi_apar_check'],
                'INSPEKSI_APAR_NOTE' => $data['inspeksi_apar_note'] ?? null,
                'FORM_CHECKLIST_REFUELING_CHECK' => $data['form_checklist_refueling_check'],
                'FORM_CHECKLIST_REFUELING_NOTE' => $data['form_checklist_refueling_note'] ?? null,
                'TEMPAT_SAMPAH_CHECK' => $data['tempat_sampah_check'],
                'TEMPAT_SAMPAH_NOTE' => $data['tempat_sampah_note'] ?? null,
                'MINEPERMIT_CHECK' => $data['minepermit_check'],
                'MINEPERMIT_NOTE' => $data['minepermit_note'] ?? null,
                'SIMPER_OPERATOR_CHECK' => $data['simper_operator_check'],
                'SIMPER_OPERATOR_NOTE' => $data['simper_operator_note'] ?? null,
                'PADLOCK_CHECK' => $data['padlock_check'],
                'PADLOCK_NOTE' => $data['padlock_note'] ?? null,
                'WADAH_PENAMPUNG_CHECK' => $data['wadah_penampung_check'],
                'WADAH_PENAMPUNG_NOTE' => $data['wadah_penampung_note'] ?? null,
                'WHEEL_CHOCK_CHECK' => $data['wheel_chock_check'],
                'WHEEL_CHOCK_NOTE' => $data['wheel_chock_note'] ?? null,
                'RADIO_KOMUNIKASI_CHECK' => $data['radio_komunikasi_check'],
                'RADIO_KOMUNIKASI_NOTE' => $data['radio_komunikasi_note'] ?? null,
                'APD_STANDAR_CHECK' => $data['apd_standar_check'],
                'APD_STANDAR_NOTE' => $data['apd_standar_note'] ?? null,
                'ADDITIONAL_NOTES' => $data['additional_notes'] ?? null,
                'DIKETAHUI' => $data['diketahui'] ?? null,
                'PENGAWAS' => Auth::user()->nik,
                'VERIFIED_DATETIME_PENGAWAS' => Carbon::now(),
                'VERIFIED_PENGAWAS' => Auth::user()->nik,
            ];

            // if (Auth::user()->role == 'FOREMAN' || Auth::user()->role == 'SUPERVISOR') {
            //     $dataToInsert['PENGAWAS'] = Auth::user()->nik;
            //     $dataToInsert['VERIFIED_DATETIME_PENGAWAS'] = Carbon::now();
            //     $dataToInsert['VERIFIED_PENGAWAS'] = Auth::user()->nik;
            // }


            KLKHFuelStation::where('UUID', $uuid)->update($dataToUpdate);

            return redirect()->route('klkh.fuelStation.index')->with('success', 'KLKH Fuel Station berhasil diupdate');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', nl2br('KLKH Fuel Station gagal diupdate..\n' . $th->getMessage()));
        }

    }

    public function preview($uuid)
    {
        $fuelStation = DB::table('KLKH_FUEL_STATION as fs')
        ->leftJoin('users as us1', 'fs.PIC', '=', 'us1.nik')

        ->leftJoin('REF_AREA as ar', 'fs.PIT_ID', '=', 'ar.id')
        ->leftJoin('REF_SHIFT as sh', 'fs.SHIFT_ID', '=', 'sh.id')
        ->leftJoin('users as us2', 'fs.PENGAWAS', '=', 'us2.nik')
        ->leftJoin('users as us3', 'fs.DIKETAHUI', '=', 'us3.nik')
        ->select(
            'fs.*',
            'fs.STATUSENABLED',
            'ar.KETERANGAN as PIT',
            'sh.KETERANGAN as SHIFT',
            'us2.name as NAMA_PENGAWAS',
            'us3.name as NAMA_DIKETAHUI',
        )
        ->where('fs.STATUSENABLED', true)
        ->where('fs.UUID', $uuid)->first();

        if($fuelStation == null){
            return redirect()->back()->with('info', 'Maaf, data tidak ditemukan');
        }else {
            $item = $fuelStation;

            $qrTempFolder = storage_path('app/public/qr-temp');
            if (!File::exists($qrTempFolder)) {
                File::makeDirectory($qrTempFolder, 0755, true);
            }

            if ($item->VERIFIED_PENGAWAS != null) {
                $fileName = 'VERIFIED_PENGAWAS' . $item->UUID . '.png';
                $filePath = $qrTempFolder . DIRECTORY_SEPARATOR . $fileName;

                QrCode::size(150)
                    ->format('png')
                    ->generate(route('verified.index', ['encodedNik' => base64_encode($item->VERIFIED_PENGAWAS)]), $filePath);

                $item->VERIFIED_PENGAWAS = asset('storage/qr-temp/' . $fileName);
            } else {
                $item->VERIFIED_PENGAWAS = null;
            }

            if ($item->VERIFIED_DIKETAHUI != null) {
                $fileName = 'VERIFIED_DIKETAHUI' . $item->UUID . '.png';
                $filePath = $qrTempFolder . DIRECTORY_SEPARATOR . $fileName;

                QrCode::size(150)
                    ->format('png')
                    ->generate(route('verified.index', ['encodedNik' => base64_encode($item->VERIFIED_DIKETAHUI)]), $filePath);

                $item->VERIFIED_DIKETAHUI = asset('storage/qr-temp/' . $fileName);
            } else {
                $item->VERIFIED_DIKETAHUI = null;
            }

            // dd($fuelStation);
        }
        return view('klkh.fuelStation.preview', compact('fuelStation'));
    }

    public function edit($uuid)
    {
        $pit = Area::where('statusenabled', true)->get();
        $shift = Shift::where('statusenabled', true)->get();

        $diketahui = DB::table('CONF_MAPPING_VERIFIER as mf')
        ->leftJoin('users as us', 'mf.USER_ID', 'us.id')
        ->select(
            'mf.STATUSENABLED',
            'mf.id as ID',
            'us.nik as nik',
            'us.name',
            'us.role'
        )->where('mf.STATUSENABLED', true)->get();

        $fuelStation = DB::table('KLKH_FUEL_STATION as fs')
        ->leftJoin('users as us1', 'fs.PIC', '=', 'us1.nik')

        ->leftJoin('REF_AREA as ar', 'fs.PIT_ID', '=', 'ar.id')
        ->leftJoin('REF_SHIFT as sh', 'fs.SHIFT_ID', '=', 'sh.id')
        ->leftJoin('users as us2', 'fs.PENGAWAS', '=', 'us2.nik')
        ->leftJoin('users as us3', 'fs.DIKETAHUI', '=', 'us3.nik')
        ->select(
            'fs.*',
            'fs.STATUSENABLED',
            'ar.KETERANGAN as PIT',
            'sh.KETERANGAN as SHIFT',
            'us2.name as NAMA_PENGAWAS',
            'us3.name as NAMA_DIKETAHUI',
        )
        ->where('fs.STATUSENABLED', true)
        ->where('fs.UUID', $uuid)->first();

        if($fuelStation == null){
            return redirect()->back()->with('info', 'Maaf, data tidak ditemukan');
        }else if($fuelStation->VERIFIED_DIKETAHUI){
            return redirect()->back()->with('info', 'KLKH sudah diverifikasi, pengeditan tidak diperbolehkan!');
        }else {
            $item = $fuelStation;

            $qrTempFolder = storage_path('app/public/qr-temp');
            if (!File::exists($qrTempFolder)) {
                File::makeDirectory($qrTempFolder, 0755, true);
            }

            if ($item->VERIFIED_PENGAWAS != null) {
                $fileName = 'VERIFIED_PENGAWAS' . $item->UUID . '.png';
                $filePath = $qrTempFolder . DIRECTORY_SEPARATOR . $fileName;

                QrCode::size(150)
                    ->format('png')
                    ->generate(route('verified.index', ['encodedNik' => base64_encode($item->VERIFIED_PENGAWAS)]), $filePath);

                $item->VERIFIED_PENGAWAS = asset('storage/qr-temp/' . $fileName);
            } else {
                $item->VERIFIED_PENGAWAS = null;
            }

            if ($item->VERIFIED_DIKETAHUI != null) {
                $fileName = 'VERIFIED_DIKETAHUI' . $item->UUID . '.png';
                $filePath = $qrTempFolder . DIRECTORY_SEPARATOR . $fileName;

                QrCode::size(150)
                    ->format('png')
                    ->generate(route('verified.index', ['encodedNik' => base64_encode($item->VERIFIED_DIKETAHUI)]), $filePath);

                $item->VERIFIED_DIKETAHUI = asset('storage/qr-temp/' . $fileName);
            } else {
                $item->VERIFIED_DIKETAHUI = null;
            }

        }

        $users = [
            'fuelStation' => $fuelStation,
            'diketahui' => $diketahui,
            'pit' => $pit,
            'shift' => $shift,
        ];

        return view('klkh.fuelStation.edit', compact('users'));
    }

    public function cetak($uuid)
    {
        $fuelStation = DB::table('KLKH_FUEL_STATION as fs')
        ->leftJoin('users as us1', 'fs.PIC', '=', 'us1.nik')

        ->leftJoin('REF_AREA as ar', 'fs.PIT_ID', '=', 'ar.id')
        ->leftJoin('REF_SHIFT as sh', 'fs.SHIFT_ID', '=', 'sh.id')
        ->leftJoin('users as us2', 'fs.PENGAWAS', '=', 'us2.nik')
        ->leftJoin('users as us3', 'fs.DIKETAHUI', '=', 'us3.nik')
        ->select(
            'fs.*',
            'fs.STATUSENABLED',
            'ar.KETERANGAN as PIT',
            'sh.KETERANGAN as SHIFT',
            'us2.name as NAMA_PENGAWAS',
            'us3.name as NAMA_DIKETAHUI',
        )
        ->where('fs.STATUSENABLED', true)
        ->where('fs.UUID', $uuid)->first();

        if($fuelStation == null){
            return redirect()->back()->with('info', 'Maaf, data tidak ditemukan');
        }else {
            $item = $fuelStation;

            $qrTempFolder = storage_path('app/public/qr-temp');
            if (!File::exists($qrTempFolder)) {
                File::makeDirectory($qrTempFolder, 0755, true);
            }

            if ($item->VERIFIED_PENGAWAS != null) {
                $fileName = 'VERIFIED_PENGAWAS' . $item->UUID . '.png';
                $filePath = $qrTempFolder . DIRECTORY_SEPARATOR . $fileName;

                QrCode::size(150)
                    ->format('png')
                    ->generate(route('verified.index', ['encodedNik' => base64_encode($item->VERIFIED_PENGAWAS)]), $filePath);

                $item->VERIFIED_PENGAWAS = asset('storage/qr-temp/' . $fileName);
            } else {
                $item->VERIFIED_PENGAWAS = null;
            }

            if ($item->VERIFIED_DIKETAHUI != null) {
                $fileName = 'VERIFIED_DIKETAHUI' . $item->UUID . '.png';
                $filePath = $qrTempFolder . DIRECTORY_SEPARATOR . $fileName;

                QrCode::size(150)
                    ->format('png')
                    ->generate(route('verified.index', ['encodedNik' => base64_encode($item->VERIFIED_DIKETAHUI)]), $filePath);

                $item->VERIFIED_DIKETAHUI = asset('storage/qr-temp/' . $fileName);
            } else {
                $item->VERIFIED_DIKETAHUI = null;
            }

            // dd($fuelStation);
        }
        return view('klkh.fuelStation.cetak', compact('fuelStation'));
    }

    public function download($uuid)
    {
        $fuelStation = DB::table('KLKH_FUEL_STATION as fs')
        ->leftJoin('users as us1', 'fs.PIC', '=', 'us1.nik')

        ->leftJoin('REF_AREA as ar', 'fs.PIT_ID', '=', 'ar.id')
        ->leftJoin('REF_SHIFT as sh', 'fs.SHIFT_ID', '=', 'sh.id')
        ->leftJoin('users as us2', 'fs.PENGAWAS', '=', 'us2.nik')
        ->leftJoin('users as us3', 'fs.DIKETAHUI', '=', 'us3.nik')
        ->select(
            'fs.*',
            'fs.STATUSENABLED',
            'ar.KETERANGAN as PIT',
            'sh.KETERANGAN as SHIFT',
            'us2.name as NAMA_PENGAWAS',
            'us3.name as NAMA_DIKETAHUI',
        )
        ->where('fs.STATUSENABLED', true)
        ->where('fs.UUID', $uuid)->first();

        if($fuelStation == null){
            return redirect()->back()->with('info', 'Maaf, data tidak ditemukan');
        }else {
            $item = $fuelStation;

            $qrTempFolder = storage_path('app/qr-temp');
            if (!File::exists($qrTempFolder)) {
                File::makeDirectory($qrTempFolder, 0755, true);
            }

            if($item->VERIFIED_PENGAWAS != null){
                $fileName = 'VERIFIED_PENGAWAS' . $item->UUID . '.png';
                $filePath = $qrTempFolder . DIRECTORY_SEPARATOR . $fileName;

                QrCode::size(150)->format('png')->generate(route('verified.index', ['encodedNik' => base64_encode($item->VERIFIED_PENGAWAS)]), $filePath);
                $item->VERIFIED_PENGAWAS = $filePath;
            }else{
                $item->VERIFIED_PENGAWAS == null;
            }

            if($item->VERIFIED_DIKETAHUI != null){
                $fileName = 'VERIFIED_DIKETAHUI' . $item->UUID . '.png';
                $filePath = $qrTempFolder . DIRECTORY_SEPARATOR . $fileName;

                QrCode::size(150)->format('png')->generate(route('verified.index', ['encodedNik' => base64_encode($item->VERIFIED_DIKETAHUI)]), $filePath);
                $item->VERIFIED_DIKETAHUI = $filePath;
            }else{
                $item->VERIFIED_DIKETAHUI == null;
            }

        }

        // return view('klkh.fuelStation.download', compact('fuelStation'));

        $pdf = PDF::loadView('klkh.fuelStation.download', compact('fuelStation'));
        return $pdf->download('KLKH Fuel Station.pdf');
    }

    public function verifiedAll(Request $request, $uuid)
    {
        $klkh =  KLKHFuelStation::where('UUID', $uuid)->first();

        try {
            KLKHFuelStation::where('ID', $klkh->ID)->update([
                'VERIFIED_PENGAWAS' => $klkh->PENGAWAS,
                'VERIFIED_DATETIME_PENGAWAS' => Carbon::now(),
                'VERIFIED_DIKETAHUI' => $klkh->DIKETAHUI,
                'VERIFIED_DATETIME_DIKETAHUI' => Carbon::now(),
                'UPDATED_BY' => Auth::user()->id,
                'CATATAN_VERIFIED_PENGAWAS' => $request->catatan_verified_all,
                'CATATAN_VERIFIED_DIKETAHUI' => $request->catatan_verified_all,
            ]);

            return redirect()->back()->with('success', 'KLKH Fuel Station berhasil diverifikasi');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', nl2br('KLKH Fuel Station gagal diverifikasi..\n' . $th->getMessage()));
        }
    }

    public function verifiedPengawas(Request $request, $uuid)
    {
        $klkh =  KLKHFuelStation::where('UUID', $uuid)->first();

        try {
            KLKHFuelStation::where('ID', $klkh->ID)->update([
                'VERIFIED_PENGAWAS' => (string)Auth::user()->nik,
                'VERIFIED_DATETIME_PENGAWAS' => Carbon::now(),
                'UPDATED_BY' => Auth::user()->id,
                'CATATAN_VERIFIED_PENGAWAS' => $request->catatan_verified_pengawas,
            ]);

            return redirect()->back()->with('success', 'KLKH Fuel Station berhasil diverifikasi');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', nl2br('KLKH Fuel Station gagal diverifikasi..\n' . $th->getMessage()));
        }
    }

    public function verifiedDiketahui(Request $request, $uuid)
    {
        $klkh =  KLKHFuelStation::where('UUID', $uuid)->first();

        try {
            KLKHFuelStation::where('ID', $klkh->ID)->update([
                'VERIFIED_DIKETAHUI' => (string)Auth::user()->nik,
                'VERIFIED_DATETIME_DIKETAHUI' => Carbon::now(),
                'CATATAN_VERIFIED_DIKETAHUI' => $request->catatan_verified_diketahui,
                'UPDATED_BY' => Auth::user()->id,
            ]);

            Activity::create([
                'STATUSENABLED' => true,
                'TANGGAL' => Carbon::now(),
                'JENIS' => 'KLKH',
                'NAMA' => Auth::user()->name,
                'NIK' => Auth::user()->nik,
                'KETERANGAN' => 'Telah memverifikasi KLKH Fuel Station',
            ]);

            return redirect()->back()->with('success', 'KLKH Fuel Station berhasil diverifikasi');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', nl2br('KLKH Fuel Station gagal diverifikasi..\n' . $th->getMessage()));
        }
    }

    public function delete($id)
    {
        try {
            Activity::create([
                'STATUSENABLED' => true,
                'TANGGAL' => Carbon::now(),
                'JENIS' => 'KLKH',
                'NAMA' => Auth::user()->name,
                'NIK' => Auth::user()->nik,
                'KETERANGAN' => 'Telah menghapus KLKH Fuel Station',
            ]);

            KLKHFuelStation::where('ID', $id)->update([
                'STATUSENABLED' => false,
                'DELETED_BY' => Auth::user()->nik,
            ]);

            return redirect()->route('klkh.fuelStation.index')->with('success', 'KLKH Fuel Station berhasil dihapus');

        } catch (\Throwable $th) {
            return redirect()->route('klkh.fuelStation.index')->with('info', nl2br('KLKH Fuel Station gagal dihapus..\n' . $th->getMessage()));
        }
    }

    public function report(Request $request)
    {
        $tanggalInput = $request->input('rangeDate');

        $startDate = Carbon::now()->toDateString();
        $endDate = $startDate;

        if ($tanggalInput) {
            if (str_contains($tanggalInput, 'to')) {
                [$startDate, $endDate] = array_map('trim', explode('to', $tanggalInput));
            } else {
                $startDate = trim($tanggalInput);
                $endDate = $startDate;
            }
        }

        $report = DB::select('EXEC APP_GET_REPORT_KLKH_FUEL_STATION @StartDate = ?, @EndDate = ?', [$startDate, $endDate]);

        return view('klkh.fuelStation.report', compact('report'));
    }
}
