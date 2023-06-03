<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\Schedule;
use App\Models\ScheduleDetail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GenerateNumberHelpers;
use Validator;

class ScheduleController extends Controller
{
    function index(Request $request)
    {

        
        $status = 4;
        $data = Schedule::join('m_pasien', 'm_pasien.id', '=', 't_schedule.id_pasien')
              ->leftJoin('t_schedule_detail', 't_schedule_detail.transactionnumber', '=', 't_schedule.transactionnumber')
              ->leftJoin('m_obat', 'm_obat.id', '=', 't_schedule_detail.id_obat')
              ->where('t_schedule.deletestatus', 0)
              ->get(['t_schedule.id','t_schedule.transactionnumber','m_pasien.name','t_schedule.description']);
        return view('schedule.index', compact('data','status'));
    }
    function create()
    {
        $dataPasien =  Pasien::where('deletestatus', 0)->get();
        $dataObat =  Obat::where('deletestatus', 0)->get();
        $status = 4;
        return view('schedule.create',compact('status','dataPasien','dataObat'));
    }

    public function store(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $getNumber = GenerateNumberHelpers::Schedule();
                        $create = new Schedule;
                                $create->transactionnumber =$getNumber;
                                $create->transactiondate = $request->transactiondate;
                                $create->id_pasien = $request->id_pasien;
                                $create->description = $request->description;
                                $create->created_by = $request->created_by;
                                $create->deletestatus=0;
                                $create->save();
                        $lastInsertID = $create->id;
                        $data = Schedule::find($lastInsertID);
                        if($request->ajax())
                            {
                                

                                    $rules = array(
                                    'id_obat.*'  => 'required',
                                    'Qty_hari.*'  => 'required'
                                    );
                                    $error = Validator::make($request->all(), $rules);
                                    if($error->fails())
                                    {
                                    return response()->json([
                                        'error'  => $error->errors()->all()
                                    ]);
                                    }

                                    $id_obat = $request->id_obat;
                                    $Qty_hari = $request->Qty_hari;
                                    $stardate = $request->stardate;
                                    $enddate = $request->enddate;
                                    $aturanpakai = $request->aturanpakai;
                                    
                                    $array = ['message' =>$data->transactionnumber];
                                    //$transaksiNo=$request->input($g);
                                    for($count = 0; $count < count($id_obat); $count++)
                                    {
                                        $data = array(
                                        
                                            'transactionnumber' => $array['message'],
                                            'id_obat' => $id_obat[$count],
                                            'Qty_hari'  => $Qty_hari[$count],
                                            'stardate' => $stardate[$count],
                                            'enddate'  => $enddate[$count],
                                            'aturanpakai' => $aturanpakai[$count]
                                        );
                                        $insert_data[] = $data; 
                                    }

                                    ScheduleDetail::insert($insert_data);
                            }
                    
                        DB::commit();
                        return response()->json([
                            'url' => url('Schedule'),
                            'message' => 'Simpan Data Berhasil'
                        ]);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return response()->json([
                'url' => url('Schedule'),
                'message' => 'Simpan Data Gagal!!'
            ]);
        }
    }

    function edit($id)
    {
         $dataPasien          =  Pasien::where('deletestatus', 0)->get();
         $dataObat            =  Obat::where('deletestatus', 0)->get();
         $datasch                 = Schedule::find($id);
         $dataschdtl              =  ScheduleDetail::where('transactionnumber',$datasch->transactionnumber)->get();
         $tglTrnsksi=
          $status = 4;
        return view('schedule.edit',compact('status','datasch','dataPasien','dataObat','dataschdtl'));
    }
     public function update($id,Request $request)
     {
        try {
            DB::beginTransaction();
                        $getNumber = GenerateNumberHelpers::Schedule();
                        $create = new Schedule;
                                //$create->transactionnumber =$getNumber;
                                $create = Schedule::find($id);
                                $create->transactiondate = $request->transactiondate;
                                $create->id_pasien = $request->id_pasien;
                                $create->description = $request->description;
                                $create->created_by = $request->created_by;
                                $create->deletestatus=0;
                                $create->save();
                                $dltsch = new ScheduleDetail;
                                //DB::ScheduleDetail('t_schedule_detail')->where('transactionnumber', $create->transactionnumber)->delete();
                                $deleted = DB::table('t_schedule_detail')->where('transactionnumber', '=', $create->transactionnumber)->delete();
                                if($request->ajax())
                                {
                                    
    
                                        $rules = array(
                                        'id_obat.*'  => 'required',
                                        'Qty_hari.*'  => 'required'
                                        );
                                        $error = Validator::make($request->all(), $rules);
                                        if($error->fails())
                                        {
                                        return response()->json([
                                            'error'  => $error->errors()->all()
                                        ]);
                                        }
    
                                        $id_obat = $request->id_obat;
                                        $Qty_hari = $request->Qty_hari;
                                        $stardate = $request->stardate;
                                        $enddate = $request->enddate;
                                        $aturanpakai = $request->aturanpakai;
                                        
                                        $array = ['message' =>$create->transactionnumber];
                                        //$transaksiNo=$request->input($g);
                                        for($count = 0; $count < count($id_obat); $count++)
                                        {
                                            $data = array(
                                            
                                                'transactionnumber' => $array['message'],
                                                'id_obat' => $id_obat[$count],
                                                'Qty_hari'  => $Qty_hari[$count],
                                                'stardate' => $stardate[$count],
                                                'enddate'  => $enddate[$count],
                                                'aturanpakai' => $aturanpakai[$count]
                                            );
                                            $insert_data[] = $data; 
                                        }
    
                                        ScheduleDetail::insert($insert_data);
                                }
                        
                        
                    
                        DB::commit();
                        return response()->json([
                            'url' => url('Schedule'),
                            'message' => 'Simpan Data Berhasil'
                        ]);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return response()->json([
                'url' => url('Schedule'),
                'message' => 'Simpan Data Gagal!!'
            ]);
        }

     }

    public function delete($id)
    {

        $current_date = new DateTime();
        Schedule::where('id', $id)
            ->update([
                'deletestatus' => 1,               
            ]);
            $data = Schedule::find($id);
            $deleted = DB::table('t_schedule_detail')->where('transactionnumber', '=', $data->transactionnumber)->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Delete Data Successfully'
        ]);
    }
}
