<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepositPackage extends Model
{
    protected $table = 'deposit_packages';

    protected $fillable = ['name','currency_id','rate','amount','installment','percentage','fine','type_id'];

    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class,'type_id');
    }
}
