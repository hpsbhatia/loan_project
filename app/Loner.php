<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loner extends Model
{
    protected $table = 'loners';

    protected $fillable = [
        'first_name',
        'last_name',
        'spouse_name',
        'father_name',
        'mother_name',
        'email_name',
        'phone_number',
        'present_address',
        'permanent_address',
        'birth_date',
        'emergency_name',
        'emergency_relationship',
        'emergency_address',
        'emergency_phone',
        'loaner_image',
        'nid_image',
        'package_id',
        'staff_id',
        'loaner_number',
        'rating',
        'salary',
        'other_income',
        'salary_spouse',
        'other_income_spouse',

    ];
    public function package()
    {
        return $this->belongsTo(LoanPackage::class,'package_id');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }
}
