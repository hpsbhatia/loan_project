<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = ['loner_id','type','loner_number','date'];

    public function loner()
    {
        return $this->belongsTo(Loner::class,'loner_id');
    }
    public function depositor()
    {
        return $this->belongsTo(Depositor::class,'loner_id');
    }

}
