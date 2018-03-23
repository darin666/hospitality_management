<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = "forms";

    protected $fillable =
    ['firstname',
    'lastname',
    'dob',
    'address',
    'passportNumber',
    'visaNumber',
    'checkInDate',
    'checkOutDate',
    'nationality',
    'apartment_id',];


    public function statusChanges()
    {
        return $this->hasMany('App\StatusChange');
    }

    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }
}
