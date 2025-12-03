<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SOPPlanningController extends Controller
{
    //

    public function ringkasanSOP(Request $request)
    {
        $name = $request->query('name', '(251118) Ringkasan SOP Dept. Planning.pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.ringkasanSOP', compact('pdfUrl', 'name'));
    }

    public function prosesPlanning(Request $request)
    {
        $name = $request->query('name', 'SOP-PLA-01-Proses Planning.pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.prosesPlanning', compact('pdfUrl', 'name'));
    }

    public function surveyKepuasanPelangganEksternal(Request $request)
    {
        $name = $request->query('name', 'SOP-PLA-02-Survey Kepuasan Pelanggan Eksternal.pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.surveyKepuasanPelangganEksternal', compact('pdfUrl', 'name'));
    }

    public function keluhanPelanggan(Request $request)
    {
        $name = $request->query('name', 'SOP-PLA-03-Keluhan Pelanggan.pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.keluhanPelanggan', compact('pdfUrl', 'name'));
    }

    public function laporanOwningOperationCost(Request $request)
    {
        $name = $request->query('name', 'SOP-PLA-04-Laporan Owning & Operation Cost.R3.pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.laporanOwningOperationCost', compact('pdfUrl', 'name'));
    }

    public function pengelolaanSuratMasukDanKeluar(Request $request)
    {
        $name = $request->query('name', 'SOP-PLA-05-Pengelolaan Surat Masuk dan Keluar.R.01.pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.pengelolaanSuratMasukDanKeluar', compact('pdfUrl', 'name'));
    }

    public function pencatatanSystemFuelManagement(Request $request)
    {
        $name = $request->query('name', 'SOP-PLA-06-Pencatatan System Fuel Management.pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.pencatatanSystemFuelManagement', compact('pdfUrl', 'name'));
    }

    public function laporanProduktivity(Request $request)
    {
        $name = $request->query('name', 'SOP-PLA-08-Laporan Produktivity.pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.laporanProduktivity', compact('pdfUrl', 'name'));
    }

    public function laporanPencatatanHoursMeter(Request $request)
    {
        $name = $request->query('name', 'SOP-PLA-09-Laporan Pencatatan Hours Meter.pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.laporanPencatatanHoursMeter', compact('pdfUrl', 'name'));
    }

    public function penetapanBaselineEnergi(Request $request)
    {
        $name = $request->query('name', 'SOP-PLA-11-Penetapan Baseline Energi.pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.penetapanBaselineEnergi', compact('pdfUrl', 'name'));
    }

    public function pengelolaanFuel(Request $request)
    {
        $name = $request->query('name', 'SOP-PLA-12-Pengelolaan Fuel.pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.pengelolaanFuel', compact('pdfUrl', 'name'));
    }

    public function pengoperasianUnitFuelTruck(Request $request)
    {
        $name = $request->query('name', 'SOP-PLA-13-Pengoperasian Unit Fuel Truck.Rev.03.pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.pengoperasianUnitFuelTruck', compact('pdfUrl', 'name'));
    }

    public function pembuatanLaporanManagementProfitLo(Request $request)
    {
        $name = $request->query('name', 'SOP-PLA-14-Pembuatan Laporan Management Profit & L().pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.pembuatanLaporanManagementProfitLo', compact('pdfUrl', 'name'));
    }

    public function pembuatanLaporanBusinessPlan(Request $request)
    {
        $name = $request->query('name', 'SOP-PLA-15-Pembuatan Laporan Business Plan.pdf');
        $pdfUrl = route('sop.show', ['name' => $name]);

        return view('sop.pembuatanLaporanBusinessPlan', compact('pdfUrl', 'name'));
    }

}
