<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $timestamps = true;
    protected $table = 't_schedule';
    protected $guarded = [];
    use HasFactory;
    
}
