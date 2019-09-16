<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CartController extends Controller
{
    public function ShowCart()
    {
    	$data = [];
        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];

        return view('Frontend.cart',$data);

    }

    public function addToCart(Request $request)
    {
    	$cart = [];

    	try {
    		$this->validate($request, [
    			'product_id' => 'required',
    		]);

    	} catch (ValidationException $e) {
    		return redirect()->back();
    	}

    	

    	$product = Product::findOrFail($request->product_id);

    	$cart = session()->has('cart') ? session()->get('cart') : [];

    	if (array_key_exists($product->id, $cart)) {
    		$cart[$product->id]['quantity']++;
    	}else{

	    	$cart[$product->id] = [
	    		'title' => $product->title,
	    		'quantity' => 1,
	    		'price' => ($product->sale_price != null && $product->sale_price > 0) ? $product->sale_price:$product->price,
	    	];
    	}

    	session(['cart' => $cart]);

        session()->flash('message', 'New product is added');

    	return redirect()->route('show.cart');
    }


    public function removeCart(Request $request)
    {
        try {
            $this->validate($request, [
                'product_id' => 'required',
            ]);

        } catch (ValidationException $e) {
            return redirect()->back();
        }

        $cart = session()->has('cart') ? session()->get('cart') : [];

        unset($cart[$request->product_id]);

        session(['cart' => $cart]);
        session()->flash('message', 'Cart item is removed');

        return redirect()->route('show.cart');
    }
}