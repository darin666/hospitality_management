<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusChange extends Model
{
    protected $table = "status_changes";


    public function form()
    {
        return $this->belongsTo('App\Form');
    }

    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}
