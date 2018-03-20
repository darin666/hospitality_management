<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = "tasks";

    protected $fillable =
    ['apartment_id',
    'status_id',
    'name',
    'category_id',
    'statusChange_id',
    'description',
    'img_link',
    ];


    public function statusChanges()
    {
        return $this->hasMany('App\StatusChange');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function apartment()
    {
        return $this->belongsTo('App\Apartment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }
}
