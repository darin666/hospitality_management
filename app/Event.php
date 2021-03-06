<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
    'title',
    'start_date',
    'end_date',
    'apartment_id',];

    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }
}
