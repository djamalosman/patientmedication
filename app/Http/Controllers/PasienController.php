<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

use DateTime;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
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
        $data= new Pasien;
        $getData = $data->selectAllData();
        $status = 3;
        return view('pasien.index', compact('getData','status'));
        //return view('pasien.index', ['datapasien'=>$getData]);
    }

    function viewsSave(Type $var = null)
    {
        //select option : Pasien::select('id','name')->get();
        //return view('pasien.create');
        $status = 3;
        return view('pasien.create', compact('status'));
    }

    function store(Request $request){
        try {
            $data= new Pasien;
            $insertData = $data->insertData($request);
            
            return redirect()->route('pasien/index')->with('message', 'Save Data Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('pasien/index')->with('message', 'Save Data Failed');
        }
    }
    
    
    function viewsUpdate($id_pasien)
    {
        //select option : Pasien::select('id','name')->get();
        //return view('pasien/update', ['getDataDetails'=>$getDataById]);
        $data= new Pasien;
        $getDataDetails= $data->selectById($id_pasien);
        $status = 3;
        return view('pasien.update', compact('getDataDetails','status'));
    }
    function update(Request $request, $id_pasien){
        
        try {
            $data=Pasien::find($id_pasien);
            $data->update($request->all());
            return redirect()->route('pasien/index')->with('message', 'Update Data Successfully');

        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('pasien/index')->with('message', 'Update Data Failed');
        }
    }
    

    function detailpasien($id_pasien)
    {
        
        $data= new Pasien;
        $getDataDetails= $data->selectById($id_pasien);
        $status = 3;
        return view('pasien.update', compact('getDataDetails','status'));
        //return view('pasien/detail', ['getDataDetails'=>$getDataById]);
    }
}
