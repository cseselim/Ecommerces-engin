@extends('Frontend.layout.layout')
@section('content')

<div class="main">
    <div class="content">
    	 
    	<div class="register_account">
    		<h3>Register New Account</h3>
    		<form action="{{ route('process.registetion') }}" method="post">
    			@csrf
		   		<table>
		   			<tbody>
					<tr>
						<td>
							<div>
								<input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
								@if ($errors->has('name'))
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $errors->first('name') }}</strong>
				                    </span>
				                @endif
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City" value="{{ old('city') }}">
							   @if ($errors->has('city'))
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $errors->first('city') }}</strong>
				                    </span>
				                @endif
							</div>
							
							<div>
								<input type="text" name="postal_code" placeholder="Zip-Code" value="{{ old('postal_code') }}">
								@if ($errors->has('postal_code'))
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $errors->first('postal_code') }}</strong>
				                    </span>
				                @endif
							</div>
							<div>
								<input type="text" name="email" placeholder="E-Mail" value="{{ old('email') }}">
								@if ($errors->has('email'))
				                    <span class="invalid-feedback" role="alert">
				                        <strong>{{ $errors->first('email') }}</strong>
				                    </span>
				                @endif
							</div>
		    			</td>
		    			<td>	
						<div>
							<input type="text" name="address" placeholder="Address" value="{{ old('address') }}">
							@if ($errors->has('address'))
			                    <span class="invalid-feedback" role="alert">
			                        <strong>{{ $errors->first('address') }}</strong>
			                    </span>
			                @endif
						</div>
			    		<div>
							<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
								<option value="">Select a Country</option>         
								<option value="AF">Afghanistan</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD">Bangladesh</option>

			         </select>
			         	@if ($errors->has('address'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('address') }}</strong>
		                    </span>
		                @endif
					 </div>		        
	
		            <div>
		          		<input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}">
		          		@if ($errors->has('phone'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('phone') }}</strong>
		                    </span>
		                @endif
		            </div>
				  
				    <div>
						<input type="text" name="password" placeholder="Password">
						@if ($errors->has('password'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('password') }}</strong>
		                    </span>
		                @endif
				    </div>
		    	</td>
		    </tr> 
		    </tbody>
		</table> 
		   <div class="search"><div><button class="grey">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>


@endsection