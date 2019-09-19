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
						<p>Category: <span>{{ $productDetails->productcategory->name }}</span></p>
						<!-- <p>Brand:<span>Samsnumg</span></p> -->
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
					@if($categories != '')
					@foreach($categories as $category)
				    	<li><a href="{{route('categoryproducts',$category->id)}}">{{ $category->name }}</a></li>
					@endforeach
					@endif
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>

@endsection