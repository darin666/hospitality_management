<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = "forms";


    public function statusChanges()
    {
        return $this->hasMany('App\StatusChange');
    }

    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }
}
