@extends('Frontend.layout.layout')
@section('content')

<div class="main">
    <div class="content">
    	 
    	<div class="register_account checkout">
    		<h3>Register New Account</h3>
    		<form>
		   		<table>
		   			<tbody>
					<tr>
						<td>
							<div>
								<input type="text" name="name" readonly placeholder="Name" value="{{ Auth()->user()->name }}">
							</div>
							
							<div>
							   <input type="text" name="city" readonly placeholder="City" value="{{ Auth()->user()->city }}">
							</div>
							
							<div>
								<input type="text" name="postal_code" readonly placeholder="Zip-Code" value="{{ Auth()->user()->postal_code }}">
							</div>
							<div>
								<input type="text" name="email" readonly placeholder="E-Mail" value="{{ Auth()->user()->email }}">
							</div>
		    			</td>
		    			<td>	
						<div>
							<input type="text" name="address" readonly placeholder="Address" value="{{ Auth()->user()->address }}">
						</div>	        
	
		            <div>
		          		<input type="text" name="phone" readonly placeholder="Phone" value="{{ Auth()->user()->phone_number }}">
		            </div>
				  
		    	</td>
		    </tr> 
		    </tbody>
		</table> 
		   <a class="profile" href="{{ route('show.cart') }}">Edit Account</a>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>

       <div class="cartoption">		
			<div class="cartpage">
			    <h2>All Order Details</h2>
				<table class="tblone">
					<tr>
						<th width="20%">Voucher No</th>
						<th width="25%">Order Date</th>
						<th width="20%">Ship To</th>
						<th width="20%">Order Total (BDT)</th>
						<th width="20%">Status</th>
					</tr>
					<?php /*dd($orderdetails)*/ ?>
					@if($orderdetails)
					@foreach($orderdetails as $order)
					
					<tr>
						<td>{{ $order->id }}</td>
						<td>{{ $order->created_at}}</td>
						<td>{{ $order->customer_name }}</td>
						<td>{{ $order->paid_amount }}</td>
						<td>{{ $order->operational_status }}</td>
					</tr>
					@endforeach
					@endif
				</table>
			</div>
    	</div>  

    </div>
 </div>	

@endsection