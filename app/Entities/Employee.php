<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $guarded = ['id'];
    

    public function orderService()
    {
        return $this->belongsToMany('App\Entities\OrderService', 'order_services_employees');
    }

//    public function order()
//    {
//        return $this->belongsToMany('App\Entities\Order');
//    }

}
