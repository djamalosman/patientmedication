<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class Pasien extends Model
{

    use HasFactory;
    public $timestamps = false;
    protected $table = 'pasiens';
    protected $primaryKey = 'id_pasien';
    protected $guarded = [];
    // use HasFactory;
    // protected $primaryKey = 'id_pasien';
    // public $timestamps = false;
    // protected $table = "pasiens";
    // protected $fillable=[
    //     'code',
    //     'name',
    //     'alamat',
    //     'tempatlahir',
    //     'tgllahir',
    //     'no_ktp',
    //     'kota',
    //     'description'
    // ];
    public function selectAllData(Type $var = null)
    {
        $data=Pasien::all();
        return $data;

    }

    public function insertData($request)
    {
        DB::beginTransaction();
            Pasien::create([
                'code' => $request->code,
                'name' => $request->name,
                'alamat' => $request->alamat,
                'tempatlahir' => $request->tempatlahir,
                'tgllahir' => $request->tgllahir,
                'no_ktp' => $request->no_ktp,
                'kota' => $request->kota,
                'description' => $request->description,

            ]);
          return  DB::commit();
    }


    public function selectById($id_pasien)
    {
        $data=Pasien::find($id_pasien);
        return $data;

        
     }

   
}
