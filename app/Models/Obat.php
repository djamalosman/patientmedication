<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    public $timestamps = true;
    protected $table = 'm_obat';
    protected $guarded = [];
    use HasFactory;
}
