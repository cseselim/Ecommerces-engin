<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;

class AuthController extends Controller
{


    public function ShowLoginForm()
    {
    	return view('Frontend.loginform');
    }

    public function processLogin(Request $request)
    {
    	$validator = $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth()->attempt($credentials)) {
            
            return redirect()->route('checkout');
        };


        session()->flash('message','Invalid email and password');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }



    public function ShowRegistetionForm()
    {
    	return view('Frontend.registetionform');
    }

    public function processRegistetion(Request $request)
    {
    	$this->validate($request,[
            'name'=>'required',
            'city'=>'required',
            'postal_code'=>'required|numeric',
            'email'=>'required|unique:users,email',
            'address'=>'required',
            'country'=>'required',
            'phone'=>'required|numeric|min:11',
            'password'=>'required|min:6|max:15',
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.form');
    }


    public function userprofile()
    {
        return view('Frontend.userprofile');
    }
}
