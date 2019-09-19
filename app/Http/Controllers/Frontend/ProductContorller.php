<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductContorller extends Controller
{
    public function productDetails($slug)
    {
    	$productDetails = Product::with('productcategory')->where('slug', $slug)->where('active', 1)->first();
    	$categories = Category::select('id','name')->get();
    	if ($productDetails == null) {
    		return redirect()->route('home');
    	}

    	return view('Frontend.productDetails',compact('productDetails','categories'));
    }

    public function categoryproducts($id)
    {
    	$products = Product::where('category_id',$id)->get();
    	return view('Frontend.categoryproduct',compact('products'));
    }
}
