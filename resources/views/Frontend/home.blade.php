<?php use Illuminate\Support\Str;?>
@extends('Frontend.layout.layout')
@section('content')

	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.html"> <img src="{{ asset('') }}images/pic4.png" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p>Lorem ipsum dolor sit amet sed do eiusmod.</p>
						<div class="button"><span><a href="preview.html">Add to cart</a></span></div>
				   </div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.html"><img src="{{ asset('') }}images/pic3.png" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						  <div class="button"><span><a href="preview.html">Add to cart</a></span></div>
					</div>
				</div>
			</div>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.html"> <img src="{{ asset('') }}images/pic3.jpg" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						<div class="button"><span><a href="preview.html">Add to cart</a></span></div>
				   </div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.html"><img src="{{ asset('') }}images/pic1.png" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Canon</h2>
						  <p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						  <div class="button"><span><a href="preview.html">Add to cart</a></span></div>
					</div>
				</div>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="{{ asset('') }}images/1.jpg" alt=""/></li>
						<li><img src="{{ asset('') }}images/2.jpg" alt=""/></li>
						<li><img src="{{ asset('') }}images/3.jpg" alt=""/></li>
						<li><img src="{{ asset('') }}images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      		<?php 
	      			foreach ($products as  $value) {
	      		 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="{{ route('product',$value->slug)}}">
					 	<img src="{{ asset('') }}products/{{$value->image}}" alt="product"/></a>
					 	
					 <h2>{{  Str::limit($value->title, 22, '...') }} </h2>
					 <p>{{  Str::limit($value->description, 50, '...') }}</p>
					 <p><span class="price">
					 	@if($value->sale_price != null && $value->sale_price > 0)
					 	BDT<strike>{{ $value->price }}</strike> {{$value->sale_price}}
					 	@else
					 		BDT{{ $value->price }}
					 	@endif
					 </span></p>
					 <div class="button"><span>
					 <form action="{{ route('addToCart') }}" method="post">
						@csrf
						<input type="hidden" name="product_id" value="{{ $value->id }}">
						<input type="submit" class="buysubmit" name="submit" value="addToCart"/>
					</form>	
					</span></div>
				     <div class="button"><span><a href="{{ route('product',$value->slug)}}" class="details">Details</a></span></div>
				</div>
				<?php 
					}
				 ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.html"><img src="{{ asset('') }}images/new-pic1.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$403.66</span></p>
					 <div class="button"><span>
					 <form action="" method="post">
						
						<input type="hidden" name="product_id" value="">
						<input type="submit" class="buysubmit" name="submit" value="addToCart"/>
					</form>	
					</span></div>
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.html"><img src="{{ asset('') }}images/new-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$621.75</span></p>
					 <div class="button"><span>
					 <form action="" method="post">
						
						<input type="hidden" name="product_id" value="">
						<input type="submit" class="buysubmit" name="submit" value="addToCart"/>
					</form>	
					</span></div>
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.html"><img src="{{ asset('') }}images/feature-pic2.jpg" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p><span class="price">$428.02</span></p>
					 <div class="button"><span>
					 <form action="" method="post">
						
						<input type="hidden" name="product_id" value="">
						<input type="submit" class="buysubmit" name="submit" value="addToCart"/>
					</form>	
					</span></div>
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
				<div class="grid_1_of_4 images_1_of_4">
				 <img src="{{ asset('') }}images/new-pic3.jpg" alt="" />
					 <h2>Lorem Ipsum is simply </h2>					 
					 <p><span class="price">$457.88</span></p>
					 <div class="button"><span>
					 <form action="" method="post">
						
						<input type="hidden" name="product_id" value="">
						<input type="submit" class="buysubmit" name="submit" value="addToCart"/>
					</form>	
					</span></div>
				     <div class="button"><span><a href="preview.html" class="details">Details</a></span></div>
				</div>
			</div>
    </div>
 </div>

@endsection