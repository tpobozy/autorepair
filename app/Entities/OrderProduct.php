<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'order_products';

    protected $guarded = ['id'];
    

    public function order()
    {
        return $this->belongsTo('App\Entities\Order');
    }
    

    public function html_purchased_price()
    {
        return \str_replace('.', ',', $this->purchased_price);
    }
    
    public function html_selling_price()
    {
        return \str_replace('.', ',', $this->selling_price);
    }

}
