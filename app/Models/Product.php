<?php

namespace App\Models;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

use Illuminate\Database\Eloquent\Model;

class Product extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $guarded = [];

    protected static function boot()
    {
    	parent::boot();
    	static::creating(function($product){
    		$product->slug = str_slug($product->title);
    	});
    }

    public function productcategory()
    {
    	return $this->hasOne(Category::class,'id','category_id');
    }
}
