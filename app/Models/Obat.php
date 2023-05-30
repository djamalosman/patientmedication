<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'm_obat';
    protected $guarded = [];
    protected $fillable=[
        'code',
        'name',
        'brand',
        'category',
        'satuan',
        'description',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
        'deletestatus'
    ];
    
}
