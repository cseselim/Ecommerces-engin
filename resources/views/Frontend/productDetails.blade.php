@extends('Frontend.layout.layout')
@section('content')

	 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="{{ asset('') }}images/preview-img.jpg" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2>{{ $productDetails->title }}</h2>
					<p>{{ $productDetails->description }}</p>					
					<div class="price">
						<p>Price: <span>${{ $productDetails->price }}</span></p>
						<p>Category: <span>Laptop</span></p>
						<p>Brand:<span>Samsnumg</span></p>
					</div>
				<div class="add-cart">
					<form action="{{ route('addToCart') }}" method="post">
						@csrf
						<input type="hidden" name="product_id" value="{{ $productDetails->id }}">
						<input type="number" class="buyfield" name="" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="addToCart"/>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p>{{ $productDetails->description }}</p>
	        
	    </div>
				
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="productbycat.html">Mobile Phones</a></li>
				      <li><a href="productbycat.html">Desktop</a></li>
				      <li><a href="productbycat.html">Laptop</a></li>
				      <li><a href="productbycat.html">Accessories</a></li>
				      <li><a href="productbycat.html#">Software</a></li>
					   <li><a href="productbycat.html">Sports & Fitness</a></li>
					   <li><a href="productbycat.html">Footwear</a></li>
					   <li><a href="productbycat.html">Jewellery</a></li>
					   <li><a href="productbycat.html">Clothing</a></li>
					   <li><a href="productbycat.html">Home Decor & Kitchen</a></li>
					   <li><a href="productbycat.html">Beauty & Healthcare</a></li>
					   <li><a href="productbycat.html">Toys, Kids & Babies</a></li>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>

@endsection