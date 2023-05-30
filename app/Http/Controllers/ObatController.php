<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GenerateNumberHelpers;
class ObatController extends Controller
{
    function index(Request $request)
    {

        $data =  Obat::where('deletestatus', 0)->get();
        $status = 2;
        return view('obat.index', compact('data','status'));
    }


    function create()
    {
        $status = 2;
        return view('obat.create',compact('status'));
    }


    public function store(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $getNumber = GenerateNumberHelpers::Obat();
            
            $validatedData = $request->validate([
                'name' => ['required', Rule::unique('m_obat', 'name')]

            ]);
            //dd($validatedData);
            if ($validatedData) {
                Obat::create([
                    'code' => $getNumber,
                    'name' => $request->name,
                    'brand' => $request->brand,
                    'category' => $request->category,
                    'satuan' => $request->satuan,
                    'description'=>$request->description,
                    'created_by' => Auth::user()->name,            
                    'deletestatus' => 0,
                    

                ]);
                DB::commit();
                return response()->json([
                    'url' => url('Obat'),
                    'message' => 'Simpan Data Berhasil'
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'url' => url('Obat'),
                'message' => 'Simpan Data Gagal!!'
            ]);
        }
    }




    function edit($id)
    {

        $data = Obat::find($id);
        $status = 2;
        return view('obat.edit',compact('data','status'));
    }



    public function update($id, Request $request)
    {
        // dd($id);
        try {
            DB::beginTransaction();
            $getNumber = GenerateNumberHelpers::Obat();
            $validatedData = $request->validate([
                'name' => ['required', Rule::unique('m_obat', 'name')]

            ]);
            if ($validatedData) {
                
                    $flight = Obat::find($id);
                    $flight->code =$getNumber;
                    $flight->name = $request->name;
                    $flight->brand = $request->brand;
                    $flight->category = $request->category;
                    $flight->satuan = $request->satuan;
                    $flight->description=$request->description;
                    $flight->updated_by = Auth::user()->name; 
                    $flight->save();
                    DB::commit();
                    
                return response()->json([
                    'url' => url('Obat'),
                    'message' => 'Update Data Berhasil'
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            
            return response()->json([
                'url' => url('Obat'),
                'message' => 'Update Data Gagal!!'
            ]);
        }

    }

    public function delete($id)
    {

        $current_date = new DateTime();
        Obat::where('id', $id)
            ->update([
                'deletestatus' => 1,               
            ]);
        return response()->json([
            'status' => 200,
            'message' => 'Delete Data Successfully'
        ]);
    }

}
