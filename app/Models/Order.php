<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function product()
    {
    	return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function orderproduct()
    {
    	return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }
}
