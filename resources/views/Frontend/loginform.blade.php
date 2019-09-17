@extends('Frontend.layout.layout')
@section('content')

<div class="main">
    <div class="content">
    	<div class="login_panel">
	    	<h3>Existing Customers</h3>
	    	<p>Sign in with the form below.</p>
	    	<form action="hello" method="get" id="member">
	            <input name="Domain" type="text" value="Username" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}">
	            <input name="Domain" type="password" value="Password" class="field" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
	        </form>
	        <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
	        <div class="buttons"><div><button class="grey">Sign In</button></div></div>
        </div>
 	
       <div class="clear"></div>
    </div>
 </div>

@endsection