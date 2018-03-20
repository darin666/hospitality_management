<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';

    protected $fillable =
    ['checkin_date',
    'checkout_date',
    'checkin_time',
    'checkout_time',
    'apartment_id',
    'guest_name',
];

    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }
}
