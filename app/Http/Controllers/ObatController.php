<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterObat;

use DateTime;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
class ObatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    
     function index(Request $request )
     {
         $data= new MasterObat;
         $getData = $data->selectAllData();
         $status = 2;
        return view('obat.index', compact('getData','status'));
        //eturn view('obat.index', ['datapasien'=>$getData]);
     }

     function viewsSave(Type $var = null)
     {
         //select option : Pasien::select('id','name')->get();
         //return view('obat.create');
         $status = 2;
         return view('obat.create', compact('status'));
     }

     function store(Request $request){
        try {
            
            $data= new MasterObat;
            $insertData = $data->insertData($request);
            
            return redirect()->route('obat/index')->with('message', 'Save Data Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('obat/index')->with('message', 'Save Data Failed');
        }
    }

     function detailobat($id_obat)
    {
        
        $data= new MasterObat;
        $getDataDetails= $data->selectById($id_obat);
        $status = 2;
        return view('obat.detail', compact('getDataDetails','status'));
        //return view('obat/detail', ['getDataDetails'=>$getDataById]);
    }

    function viewsUpdate($id_obat)
    {
        //select option : Pasien::select('id','name')->get();
        $data= new MasterObat;
        $getDataDetails= $data->selectById($id_obat);
        $status = 2;
        return view('obat.update', compact('getDataDetails','status'));
        //return view('obat/update', ['getDataDetails'=>$getDataById]);
    }

    function update(Request $request, $id_obat){
        
        try {
            $data=MasterObat::find($id_obat);
            $data->update($request->all());
            return redirect()->route('obat/index')->with('message', 'Update Data Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('obat/index')->with('message', 'Update Data Failed');
        }
    }

}
