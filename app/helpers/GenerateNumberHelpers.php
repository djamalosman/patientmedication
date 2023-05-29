<?php

namespace App\Helpers;

use DateTime;
use App\Models\Pasien;


class GenerateNumberHelpers
{


    public static function Pasien(): string
    {

        try {

            $current_date_time = new DateTime();

            $date_sequence = $current_date_time->format("dmy");


            //section generate the sequence of running number of trip sheet

            $lastTransactionId = Pasien::orderBy('id', 'desc')->first();


            if (!$lastTransactionId)
                // We get here if there is no TripSheet at all
                // If there is no Trip sheet number set it to 0, which will be 1 at the end.
                $number = 0;
            else

                $number = substr($lastTransactionId->code, 4);




            return "P-"  . sprintf('%04d', intval($number) + 1);
        } catch (\Exception $e) {
            dd($e);
        }
    }

   }
