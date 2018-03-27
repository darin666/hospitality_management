<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = ['title','start_date','end_date'];

    public function apartment()                         // added
    {
        return $this->belongsTo('App\Apartment');
    }
}
