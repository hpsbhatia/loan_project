<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanPackage extends Model
{
    protected $table = 'loan_packages';

    protected $fillable = ['name','rate','currency_id','amount','installment','percentage','fine','type_id'];

    public function currency()
    {
        return $this->belongsTo(Currency::class,'currency_id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class,'type_id');
    }
}
