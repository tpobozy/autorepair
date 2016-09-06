<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $guarded = ['id'];
    

    public function car()
    {
        return $this->belongsTo('App\Entities\Car');
    }

    public function services()
    {
        return $this->hasMany('App\Entities\OrderService');
    }

    public function products()
    {
        return $this->hasMany('App\Entities\OrderProduct');
    }


    public function html_fuel()
    {
        return ($this->fuel == 'petrol') ? 'benzyna' : 'diesel';
    }

}
