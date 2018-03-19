<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }
}
