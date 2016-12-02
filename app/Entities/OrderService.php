<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
    protected $table = 'order_services';

    protected $fillable = [
        'order_id',
        'service_id',
        'price',
    ];

    public function order()
    {
        return $this->belongsTo('App\Entities\Order');
    }

    public function employees()
    {
        return $this->belongsToMany('App\Entities\Employee', 'order_services_employees');
    }

    public function service()
    {
        return $this->hasOne('App\Entities\Service');
    }

    public function hasEmployee($employeeId)
    {
        return OrderService::whereHas('employees', function ($query) use ($employeeId) {
            $query->where('employee_id', '=', $employeeId);
            $query->where('order_service_id', '=', $this->id);
        })->count();
    }

    public function html_price()
    {
        return \str_replace('.', ',', $this->price);
    }

}
