<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KKHController extends Controller
{
    //
    public function index()
    {
        return view('kkh.index');
    }

    public function all_api(Request $request)
    {

        $offset = $request->input('start', 0);   // Offset
        $length = $request->input('length', 10); // Default 10 items
        $draw = $request->input('draw');

        $kkh = DB::connection('kkh')->table('db_payroll.dbo.web_kkh as kkh')
            ->leftJoin('db_payroll.dbo.tbl_data_hr as hr', 'kkh.nik', '=', 'hr.nik')
            ->leftJoin('db_payroll.dbo.tbl_data_hr as hr2', 'kkh.nik_pengawas', '=', 'hr2.nik')
            ->leftJoin('db_payroll.dbo.tm_departemen as dp', 'hr.Id_Departemen', '=', 'dp.ID_Departemen')
            ->leftJoin('db_payroll.dbo.tm_perusahaan as pr', 'hr.ID_Perusahaan', '=', 'pr.ID_Perusahaan')
            ->leftJoin('db_payroll.dbo.tm_jabatan as jb', 'hr.ID_Jabatan', '=', 'jb.ID_Jabatan')
            ->select(
                'kkh.id',
                'kkh.tgl',
                DB::raw("FORMAT(kkh.tgl_input, 'yyyy-MM-dd HH:mm') as TANGGAL_DIBUAT"),
                'hr.Nik as NIK_PENGISI',
                'hr.Nama as NAMA_PENGISI',
                'kkh.shift_kkh as SHIFT',
                'jb.Jabatan as JABATAN',
                DB::raw("
                    CASE
                        WHEN kkh.jam_pulang IS NULL OR LTRIM(RTRIM(kkh.jam_pulang)) = '' THEN '-'
                        ELSE
                            RIGHT('0' + LEFT(kkh.jam_pulang, CHARINDEX(':', kkh.jam_pulang) - 1), 2)
                            + ':' +
                            RIGHT('0' + RIGHT(kkh.jam_pulang, LEN(kkh.jam_pulang) - CHARINDEX(':', kkh.jam_pulang)), 2)
                    END AS JAM_PULANG
                "),
                DB::raw("
                    CASE
                        WHEN kkh.jam_tidur IS NULL OR LTRIM(RTRIM(kkh.jam_tidur)) = '' THEN '-'
                        ELSE
                            RIGHT('0' + LEFT(kkh.jam_tidur, CHARINDEX(':', kkh.jam_tidur) - 1), 2)
                            + ':' +
                            RIGHT('0' + RIGHT(kkh.jam_tidur, LEN(kkh.jam_tidur) - CHARINDEX(':', kkh.jam_tidur)), 2)
                    END AS JAM_TIDUR
                "),
                DB::raw("
                    CASE
                        WHEN kkh.jam_bangun IS NULL OR LTRIM(RTRIM(kkh.jam_bangun)) = '' THEN '-'
                        ELSE
                            RIGHT('0' + LEFT(kkh.jam_bangun, CHARINDEX(':', kkh.jam_bangun) - 1), 2)
                            + ':' +
                            RIGHT('0' + RIGHT(kkh.jam_bangun, LEN(kkh.jam_bangun) - CHARINDEX(':', kkh.jam_bangun)), 2)
                    END AS JAM_BANGUN
                "),
                DB::raw("
                    STR(
                        ROUND(
                            CASE
                                WHEN DATEDIFF(MINUTE, kkh.jam_tidur, kkh.jam_bangun) < 0 THEN
                                    DATEDIFF(MINUTE, kkh.jam_tidur, DATEADD(DAY, 1, kkh.jam_bangun)) / 60.0
                                ELSE
                                    DATEDIFF(MINUTE, kkh.jam_tidur, kkh.jam_bangun) / 60.0
                            END, 1
                        ), 10, 1
                    ) AS TOTAL_TIDUR
                "),
                 DB::raw("
                    CASE
                        WHEN kkh.jam_berangkat IS NULL OR LTRIM(RTRIM(kkh.jam_berangkat)) = '' THEN '-'
                        ELSE
                            RIGHT('0' + LEFT(kkh.jam_berangkat, CHARINDEX(':', kkh.jam_berangkat) - 1), 2)
                            + ':' +
                            RIGHT('0' + RIGHT(kkh.jam_berangkat, LEN(kkh.jam_berangkat) - CHARINDEX(':', kkh.jam_berangkat)), 2)
                    END AS JAM_BERANGKAT
                "),
                'kkh.fit_or as FIT_BEKERJA',
                DB::raw('UPPER(kkh.keluhan) as KELUHAN'),
                'kkh.masalah_pribadi as MASALAH_PRIBADI',
                'kkh.ferivikasi_pengawas',
                'kkh.nik_pengawas as NIK_PENGAWAS',
                'hr2.Nama as NAMA_PENGAWAS'
            )
            ->where('dp.Departemen', 'Planning');

        if ($request->search['value']) {
            $searchValue = '%' . $request->search['value'] . '%';
            $columnsToSearch = ['hr.Nik', 'hr.Nama', 'kkh.shift_kkh', 'kkh.jam_pulang', 'kkh.jam_tidur', 'kkh.jam_bangun', 'kkh.jam_berangkat', 'kkh.fit_or', 'hr2.Nama'];

            $kkh->where(function($query) use ($columnsToSearch, $searchValue) {
                foreach ($columnsToSearch as $column) {
                    $query->orWhere($column, 'like', $searchValue);
                }
            });
        }


        $tanggalInput = $request->input('tanggalKKH');

        $startDate = Carbon::now();
        $endDate = $startDate;


        if ($tanggalInput) {
            if (str_contains($tanggalInput, 'to')) {
                [$startDate, $endDate] = array_map('trim', explode('to', $tanggalInput));
            } else {
                $startDate = trim($tanggalInput);
                $endDate = $startDate;
            }

        }

        // return $endDate;



        $kkh->whereBetween('kkh.tgl', [$startDate, $endDate]);

        $shift = $request->shift;
        if ($shift == 'Pagi') {
            $kkh->where('kkh.shift_kkh', $shift);
        }elseif($shift == 'Malam'){
            $kkh->where('kkh.shift_kkh', $shift);
        }

        $cluster = $request->cluster; // contoh: "A1"
        // $allAssignments = AssignmentOperator::select('NIK', 'CLASS')->get();


        $filteredRecords = $kkh->count();


        $kkh = $kkh
        ->orderBy('kkh.tgl')
        ->offset($offset)
        ->limit($length)
        ->get();

        // Return JSON response
        return response()->json([
            'draw' => $draw,
            'recordsTotal' => $filteredRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $kkh,
        ]);

    }

    public function verifikasi(Request $request)
    {

        // return $request->all();
        $rowID = $request->rowID;

        DB::connection('kkh')->table('web_kkh')
            ->where('id', $rowID)
            ->update([
                'ferivikasi_pengawas' => true,
                'nik_pengawas' => Auth::user()->nik,
            ]);

        return response()->json(['status' => 'ok']);
    }
}
