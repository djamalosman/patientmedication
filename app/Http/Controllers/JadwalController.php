<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use DateTime;
use DateTimeZone;
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


class JadwalController extends Controller
{
    public function index(Request $request)
    {

        $data = Schedule::join('m_pasien', 'm_pasien.id', '=', 't_schedule.id_pasien')
              ->leftJoin('t_schedule_detail', 't_schedule_detail.transactionnumber', '=', 't_schedule.transactionnumber')
              ->leftJoin('m_obat', 'm_obat.id', '=', 't_schedule_detail.id_obat')
              ->where('t_schedule.deletestatus', 0)
              ->get([
                    't_schedule.id',
                    't_schedule.transactionnumber',
                    'm_pasien.name as namapasien',
                    'm_pasien.phone as nomortelepon',
                    'm_obat.name as namaobat',
                    'm_obat.description as descriptionobat',
                    't_schedule.description',
                    't_schedule.transactionnumber',
                    't_schedule_detail.aturanpakai',
                    't_schedule_detail.stardate',
                    't_schedule_detail.enddate',
                    't_schedule_detail.Qty_hari'
                ]);
               
              foreach ($data as $value) {
                $pesan = 'Kepada ibu/bapak, pemberitahuan meminum obat "' . $value->namaobat . '" pada hari ini, untuk aturan pakainya sebagai berikut: "' . $value->aturanpakai . '"';
                    //$datenow=date("Y-m-d H:i:s");
                    $timezone = new DateTimeZone('Asia/Jakarta');
                    $datetime = new DateTime('now', $timezone);
                    $datenow = $datetime->format('Y-m-d H:i:00');
                    
                    if($datenow == $value->enddate ||$datenow > $value->enddate )
                    {
                        
                    }
                    elseif($datenow == $value->stardate)
                    {
                        echo $pesan;
                    }
                    else
                    {
                        echo "gagal";
                    }
                    //dd($datenow);
                    
              }
        
        // $basic  = new \Vonage\Client\Credentials\Basic("ba889985", "l3LAv6RvXH1kIusf");
        // $client = new \Vonage\Client($basic);
        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS("+6289693213671",'weappfix', 'A text message sent using the Nexmo SMS API')
        // );
        
        // $message = $response->current();
        
        // if ($message->getStatus() == 0) {
        //     echo "The message was sent successfully\n";
        // } else {
        //     echo "The message failed with status: " . $message->getStatus() . "\n";
        // }
    }
    

    
}
