<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class HomeController extends Controller
{
    public function home()
    {
    	$products = Product::select(['id','title','image','slug','price','sale_price','description'])->get();
    	return view('Frontend.home',compact('products'));
    }

    public function products()
    {
    	return view('Frontend.products');
    }

    public function contact()
    {
    	return view('Frontend.contact');
    }
}
