<?php

namespace App\Http\Controllers;

use App\Models\MappingVerifier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class MappingVerifierController extends Controller
{
    //
    public function index()
    {

        $user = User::where('statusenabled', true)
            ->whereNotIn('role', ['ADMIN', 'FUELMAN', 'OPERATOR'])
            ->get();


        $data = DB::table('CONF_MAPPING_VERIFIER as mf')
        ->leftJoin('users as us', 'mf.USER_ID', 'us.id')
        ->select(
            'mf.STATUSENABLED',
            'mf.id as ID',
            'mf.USER_ID',
            'us.nik as NIK',
            'us.name as NAME',
            'us.role as ROLE'
        )->get();

        return view('mappingVerifier.index', compact('data', 'user'));
    }

    public function insert(Request $request)
    {
        $mapping = MappingVerifier::all();
            try {
                $isExists = $mapping->contains('USER_ID', $request->user_id);

                if ($isExists) {
                    return redirect()->back()->with('info', 'Maaf user sudah dimappingkan');
                } else {
                    MappingVerifier::create([
                        'UUID' => (string) Uuid::uuid4()->toString(),
                        'USER_ID' => $request->user_id,
                        'STATUSENABLED' => $request->statusenabled == 'true' ? 1 : 0,
                    ]);

                    return redirect()->back()->with('success', 'User berhasil ditambahkan');
                }
            } catch (\Throwable $th) {
                return redirect()->back()->with('info', $th->getMessage());
            }
    }

    public function statusEnabled($id)
    {
        $user = MappingVerifier::where('id', $id)->first();

        try {
            if($user->STATUSENABLED == true){

                MappingVerifier::where('id', $id)->update([
                    'STATUSENABLED' => false,
                ]);

            }else{
                MappingVerifier::where('id', $id)->update([
                    'STATUSENABLED' => true,
                ]);
            }

            return redirect()->back()->with('success', 'Ubah status berhasil');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', nl2br('Ubah status gagal...\n' . $th->getMessage()));
        }
    }
}
