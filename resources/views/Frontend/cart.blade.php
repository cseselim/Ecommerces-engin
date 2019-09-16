@extends('Frontend.layout.layout')
@section('content')

	<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<?php 
			    		if (session()->get('message')) { ?>
			    			<div class="message">
			    				<?php echo session()->get('message'); ?>
			    			</div>
			    	<?php } ?>
						<table class="tblone">
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php $total = 0; ?>
							<?php foreach ($cart as $key => $value) { ?>
							<tr>
								<td>{{ $value['title'] }}</td>
								<td><img src="images/new-pic3.jpg" alt=""/></td>
								<td>Tk. {{ $value['price'] }}</td>
								<td>
									<form action="" method="post">
										<input type="number" name="" value="{{ $value['quantity'] }}"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>Tk. {{ $price = $value['price'] * $value['quantity'] }}</td>
								<td>
									<form action="{{ route('remove.cart') }}" method="post">
										@csrf
										<input type="hidden" name="product_id" value="{{ $key }}"/>
										<input type="submit" name="submit" value="remove"/>
									</form>
								</td>
							</tr>
							<?php $total = $total+$price; 
							 } ?>
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>TK. {{$total}}</td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>TK. 31500</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>TK. 241500 </td>
							</tr>
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.html"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.html"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

@endsection