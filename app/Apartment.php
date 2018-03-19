<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = "apartments";


    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function forms()
    {
        return $this->hasMany('App\Form');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation','apartment_id','id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}
