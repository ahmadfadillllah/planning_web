<?php

namespace App\Http\Controllers;

use App\Models\MappingSOP;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class MappingSOPController extends Controller
{
    //
    public function index()
    {
        $data = MappingSOP::all();

        return view('mappingSOP.index', compact('data'));
    }

    public function insert(Request $request)
    {

        try {
            if ($request->hasFile('file')) {
                $file      = $request->file('file');
                $fileName  = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('sop'), $fileName);
            } else {
                $fileName = null;
            }

            MappingSOP::create([
                'UUID' => (string) Uuid::uuid4()->toString(),
                'NO_URUT' => $request->no_urut,
                'NAME' => $request->name,
                'FILE'          => $fileName,
                'STATUSENABLED' => $request->statusenabled == 'true' ? 1 : 0,
            ]);

            return redirect()->back()->with('success', 'SOP berhasil ditambahkan');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', $th->getMessage());
        }
    }

    public function statusEnabled($id)
    {
        $user = MappingSOP::where('id', $id)->first();

        try {
            if($user->STATUSENABLED == true){

                MappingSOP::where('id', $id)->update([
                    'STATUSENABLED' => false,
                ]);

            }else{
                MappingSOP::where('id', $id)->update([
                    'STATUSENABLED' => true,
                ]);
            }

            return redirect()->back()->with('success', 'Ubah status berhasil');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', nl2br('Ubah status gagal...\n' . $th->getMessage()));
        }
    }
}
