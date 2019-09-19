<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function userorder()
    {
    	return $this->belongsTo(Order::class,'order_id','id');
    }
    public function productdetais()
    {
    	return $this->belongsTo(Product::class,'product_id','id');
    }
}
