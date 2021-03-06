<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'name',
        'address',
        'nip',
        'telephone',
        'make',
        'model',
        'license_number',
        'year',
        'odometer',
        'engine_size',
        'radio_code',
        'vin',
        'number',
        'date',
        'symptoms',
        'engine_power',
        'fuel',
        'review',
        'fuel_level',
        'is_test_drive',
        'is_park_outside',
        'is_keep_parts',
    ];

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
