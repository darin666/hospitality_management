<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";


    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
