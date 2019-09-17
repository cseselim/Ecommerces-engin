@extends('Frontend.layout.layout')
@section('content')

<div class="main">
    <div class="content">
    	<div class="login_panel">
	    	<h3>Existing Customers</h3>
	    	<p>Sign in with the form below.</p>
	    	<?php 
	    		if (session()->get('message')) { ?>
	    			<div class="message">
	    				<?php echo session()->get('message'); ?>
	    			</div>
	    	<?php } ?>
	    	<form action="{{ route('process.login') }}" method="post" id="member">
	    		@csrf
	            <input  type="text" name="email" placeholder="Email" class="field">
	            @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
	            <input  type="password" name="password" placeholder="Password" class="field">
	            @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
	        
	        <p class="note">If you forgot your passoword just enter your email and click and Register now <a href="{{ route('registetion.from') }}">Register</a></p>
	        <div class="buttons"><div><button type="submit" class="grey">Sign In</button></div></div>
	        </form>
        </div>
 	
       <div class="clear"></div>
    </div>
 </div>

@endsection