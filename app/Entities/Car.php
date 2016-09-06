<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    protected $guarded = ['id'];


    public function client()
    {
        return $this->belongsTo('App\Entities\Client');
    }

    public function orders()
    {
        return $this->hasMany('App\Entities\Order');
    }

}
