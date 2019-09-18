@extends('Frontend.layout.layout')
@section('content')

	<div class="main">
    <div class="content">
    	 
    	<div class="register_account checkout">
    		<h3>Shipping Address</h3>
    		<p class="note" >If your edit your Shipping Adderess you can edit now.</p>
    		<form action="{{ route('order.now') }}" method="post">
    			@csrf
		   		<table>
		   			<tbody>
					<tr>
						<td>
							<div>
								<input type="text" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
								@if ($errors->has('name'))
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $errors->first('name') }}</strong>
				                    </span>
				                @endif
							</div>
							
							<div>
				          		<input type="text" name="phone" placeholder="Phone" value="{{ Auth::user()->phone_number }}">
				          		@if ($errors->has('phone'))
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $errors->first('phone') }}</strong>
				                    </span>
				                @endif
				            </div>
							
							<div>
								<input type="text" name="email" placeholder="E-Mail" value="{{ Auth::user()->email }}">
								@if ($errors->has('email'))
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $errors->first('email') }}</strong>
				                    </span>
				                @endif
							</div>
		    			</td>
		    			<td>	

						<div>
						   <input type="text" name="city" placeholder="City" value="{{ Auth::user()->city }}">
						   @if ($errors->has('city'))
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $errors->first('city') }}</strong>
			                    </span>
			                @endif
						</div>
        
						<div>
							<input type="text" name="postal_code" placeholder="Zip-Code" value="{{ Auth::user()->postal_code }}">
							@if ($errors->has('postal_code'))
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $errors->first('postal_code') }}</strong>
			                    </span>
			                @endif
						</div>

						<div>
							<input type="text" name="address" placeholder="Address" value="{{ Auth::user()->address }}">
							@if ($errors->has('address'))
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $errors->first('address') }}</strong>
			                    </span>
			                @endif
						</div>
		    	</td>
		    </tr> 
		    </tbody>
		</table>
			<br>	
			<div>
				<input type="radio" name="payment" value="Cash On Delivery"> Cash On Delivery 
				<input type="radio" name="payment" value="bKash"> bKash
			</div>
			<br>

			<div class="padding_top10"> 
				<fieldset class="coment_box" id="bkash_ins" style="display: block;">
				    <legend>bKash Payment instruction</legend>
				    <div>
				        <p>You should follow these steps to fulfill the order using bKash Payment Method</p>
				        <ul>
				            <li>Please pay the bill to <span class="textStyle1">01841300401</span> by bKash (through agent if you has no bKash account).</li>
				            <li>Please use <span class="textStyle1">"payment"</span> option from your mobile menu after dialing *247# (Or ask bKash agent to use <span class="textStyle1">payment</span> option to
				                send money)
				            </li>
				            <li>After the transaction, take the Transaction ID (if you paid from bKash Agent, then collect from them)</li>
				            <li>Go to your account and view the order.</li>
				            <li>Now fulfill the form "<span class="textStyle1">Update bkash Transaction Id</span></li>
				        </ul>
				    </div>
				</fieldset> 
			</div>

		   <div class="search"><div><button class="grey">Order Now</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>


@endsection