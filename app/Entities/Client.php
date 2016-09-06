<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $guarded = ['id'];


    public function cars()
    {
        return $this->hasMany('App\Entities\Car');
    }
    
}
