<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depositor extends Model
{
    protected $table = 'depositors';

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
        'depositor_image',
        'nid_image',
        'package_id',
        'staff_id',
        'depositor_number',
    ];
    public function package()
    {
        return $this->belongsTo(DepositPackage::class,'package_id');
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id');
    }
}
