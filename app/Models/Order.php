<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function customer()
    {
    	return $this->belogsTo(User::class);
    } 

    public function processor()
    {
    	return $this->hasOne(User::class, 'processed_by');
    }

    public function products()
    {
    	return $this->hasOne(OrderProduct::class);
    }
}
