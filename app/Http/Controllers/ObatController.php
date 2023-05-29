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
         return view('obat.index', ['datapasien'=>$getData]);
     }

     function viewsSave(Type $var = null)
     {
         //select option : Pasien::select('id','name')->get();
         return view('obat.create');
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
        $getDataById= $data->selectById($id_obat);
        return view('obat/detail', ['getDataDetails'=>$getDataById]);
    }

    function viewsUpdate($id_obat)
    {
        //select option : Pasien::select('id','name')->get();
        $data= new MasterObat;
        $getDataById= $data->selectById($id_obat);
        return view('obat/update', ['getDataDetails'=>$getDataById]);
    }

}
