<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterObat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_obat';
    protected $table = 'obats';
    protected $guarded = [];


    public function selectAllData(Type $var = null)
    {
        $data=MasterObat::all();
        return $data;

    }

    public function insertData($request)
    {
        DB::beginTransaction();
        MasterObat::create([
                'code' => $request->code,
                'name' => $request->name,
                'satuan' => $request->satuan,
                'category' => $request->category,
                'brand' => $request->brand,
                'description' => $request->description,

            ]);
          return  DB::commit();
    }


    public function selectById($id_obat)
    {
        $data=MasterObat::find($id_obat);
        return $data;

        
     }
}
