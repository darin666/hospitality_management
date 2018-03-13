<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "statuses";


    public function apartments()
    {
        return $this->hasMany('App\Apartment');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
