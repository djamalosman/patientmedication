<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleDetail extends Model
{
    public $timestamps = true;
    protected $table = 't_schedule_detail';
    protected $guarded = [];
    use HasFactory;
    protected $fillable = ['transactionnumber', 'id_obat', 'Qty_hari', 'stardate', 'enddate', 'aturanpakai'];
}
