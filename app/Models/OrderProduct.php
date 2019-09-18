<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function order()
    {
    	return $this->belogsTo(Order::class);
    }
    public function product()
    {
    	return $this->belogsTo(Product::class);
    }
}
