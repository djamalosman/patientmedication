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
        $status = 3;
        return view('pasien.index', compact('data','status'));
    }


    function create()
    {
        $status = 3;
        return view('pasien.create',compact('status'));
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
        $status = 3;
        return view('pasien.edit',compact('data','status'));
    }



    public function update($id,Request $request)
    {
        try {
            DB::beginTransaction();
            $getNumber = GenerateNumberHelpers::Pasien();
            $validatedData = $request->validate([
                'name' => ['required', Rule::unique('m_pasien', 'name')]

            ]);
            if ($validatedData) {
                // Pasien::where('id', $id)->update([
       
                //     'name' => $request->name,
                //     'alamat' => $request->alamat,
                //     'tempat' => $request->tempat,
                //     'tgllahir' => $request->tgllahir,
                //     'kota' => $request->kota,
                //     'ktp' => $request->ktp,
                //     'phone' => $request->phone,
                //     'updated_by' => Auth::user()->name

                // ]);

                $flight = Pasien::find($id);
                    $flight->code =$getNumber;
                    $flight->name = $request->name;
                    $flight->alamat = $request->alamat;
                    $flight->tempat = $request->tempat;
                    $flight->tgllahir = $request->tgllahir;
                    $flight->kota=$request->kota;
                    $flight->ktp=$request->ktp;
                    $flight->phone=$request->phone;
                    $flight->updated_by = Auth::user()->name; 
                    $flight->save();
                    
             
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
