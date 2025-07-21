<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $tahun = Carbon::now()->year;

        // Ambil jumlah per bulan dari database
        $dataPerBulan = DB::table('KLKH_FUEL_STATION as fs')
            ->select(
                DB::raw('MONTH(fs.DATE) as bulan'),
                DB::raw('COUNT(*) as jumlah')
            )
            ->whereYear('fs.DATE', $tahun)
            ->where('fs.STATUSENABLED', true)
            ->groupBy(DB::raw('MONTH(fs.DATE)'))
            ->orderBy(DB::raw('MONTH(fs.DATE)'))
            ->get()
            ->keyBy('bulan');


        $labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        $dataPerBulan = collect(range(1, 12))->map(function ($bulan) use ($dataPerBulan) {
            return $dataPerBulan->has($bulan) ? $dataPerBulan->get($bulan)->jumlah : 0;
        });


        return view('dashboard.index', [
            'chartLabels' => $labels,
            'chartData' => $dataPerBulan,
        ]);

    }
}
