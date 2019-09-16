<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductContorller extends Controller
{
    public function productDetails($slug)
    {
    	$productDetails = Product::where('slug', $slug)->where('active', 1)->first();

    	if ($productDetails == null) {
    		return redirect()->route('home');
    	}

    	return view('Frontend.productDetails',compact('productDetails'));
    }
}
