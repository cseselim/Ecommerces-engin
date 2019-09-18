<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;

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

    public function cartclear()
    {
        session(['cart' => []]);
        return redirect()->route('show.cart');
    }


    public function checkout()
    {
        if (auth()->check()) {
            return view('Frontend.checkout');
        }else{
            return redirect()->route('login.form');
        }
    }


    public function order(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'city'=>'required',
            'postal_code'=>'required',
            'email'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric|min:11',
        ]);

        $data['cart'] = session()->has('cart') ? session()->get('cart') : [];
       $total_amount = 0;
        foreach ($data['cart'] as  $value) {
            $total_amount = $total_amount + ($value['price'] * $value['quantity']);
        }
        session(['total_amount'=> $total_amount]);

        $order = Order::create([
            'user_id' => Auth()->user()->id,
            'customer_name' => $request->name,
            'customer_phone_number' => $request->phone,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'total_amount' => $total_amount,
            'paid_amount' => $total_amount,
        ]);

        foreach ($data['cart'] as $product_id => $value) {
            $total_amount = $total_amount + ($value['price'] * $value['quantity']);
            $order->products()->create([
                'product_id' => $product_id,
                'quantity' => $value['quantity'],
                'price' => $value['price'],
            ]);
        }

        session(['cart' => []]);
        return redirect()->route('show.cart');


    }
}
