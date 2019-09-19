<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountVerification;
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
            $user = Auth()->user();
            if ($user->email_verified == 0) {

                session()->flash('message','Your account is not activated. Please verify your email!');
                Auth::logout();
                return view('Frontend.loginform');

            }

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


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'address' => $request->address,
            'email_verification_token' => str_random(40),
            'password' => Hash::make($request->password),
        ]);

        Mail::to($user->email)->send(new AccountVerification($user));
        session()->flash('message','Please check your email and verify your account!');
        return redirect()->route('login.form');
    }


    public function userprofile()
    {
        return view('Frontend.userprofile');
    }

    public function accountvarify($token = null)
    {
        if ($token == null) {
            session()->flash('message','Invalid Token');
            return redirect()->route('login.form');
        }

        $user = User::where('email_verification_token',$token)->first();

        if ($user == null) {
            session()->flash('message','Invalid Token');
            return redirect()->route('login.form');
        }

        $user->update([
            'email_verified' => 1,
            'email_verification_token' => '',
        ]);

        session()->flash('message','Your account is accivated. You can login now.');
        return redirect()->route('login.form');
    }
}
