<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GenerateNumberHelpers;

class PasienController extends Controller
{
    function index(Request $request)
    {

        $data =  Pasien::where('deletestatus', 0)->get();
        return view('pasien.index', compact('data'));
    }


    function create()
    {
        return view('pasien.create');
    }


    public function store(Request $request)
    {
    
        try {
            DB::beginTransaction();
            $getNumber = GenerateNumberHelpers::Pasien();
            $validatedData = $request->validate([
                'name' => ['required', Rule::unique('m_pasien', 'name')]

            ]);
            if ($validatedData) {
                Pasien::create([
                    'code' => $getNumber,
                    'name' => $request->name,
                    'alamat' => $request->alamat,
                    'tempat' => $request->tempat,
                    'tgllahir' => $request->tgllahir,
                    'kota' => $request->kota,
                    'ktp' => $request->ktp,
                    'phone' => $request->phone,
                    'created_by' => Auth::user()->name,            
                    'deletestatus' => 0,

                ]);
             
                DB::commit();
                return response()->json([
                    'url' => url('Pasien'),
                    'message' => 'Simpan Data Berhasil'
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'url' => url('Pasien'),
                'message' => 'Simpan Data Gagal!!'
            ]);
        }
    }




    function edit($id)
    {

        $data = Pasien::find($id);
        return view('pasien.edit',compact('data'));
    }



    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $getNumber = GenerateNumberHelpers::Pasien();
            $validatedData = $request->validate([
                'name' => ['required', Rule::unique('m_pasien', 'name')]

            ]);
            if ($validatedData) {
                Pasien::where('id', $id)->update([
       
                    'name' => $request->name,
                    'alamat' => $request->alamat,
                    'tempat' => $request->tempat,
                    'tgllahir' => $request->tgllahir,
                    'kota' => $request->kota,
                    'ktp' => $request->ktp,
                    'phone' => $request->phone,
                    'updated_by' => Auth::user()->name

                ]);
             
                DB::commit();
                return response()->json([
                    'url' => url('Pasien'),
                    'message' => 'Update Data Berhasil'
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'url' => url('Pasien'),
                'message' => 'Update Data Gagal!!'
            ]);
        }

    }

    public function delete($id)
    {

        $current_date = new DateTime();
        Pasien::where('id', $id)
            ->update([
                'deletestatus' => 1,               
            ]);
        return response()->json([
            'status' => 200,
            'message' => 'Delete Data Successfully'
        ]);
    }

}
