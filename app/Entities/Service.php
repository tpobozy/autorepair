<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'number',
        'title',
    ];

    public function order()
    {
        return $this->belongsToMany('App\Entities\Order');
    }

}
