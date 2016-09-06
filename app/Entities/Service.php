<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $guarded = ['id'];
    

    public function order()
    {
        return $this->belongsToMany('App\Entities\Order');
    }

}
