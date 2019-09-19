<?php use Illuminate\Support\Str;?>
@extends('Frontend.layout.layout')
@section('content')
	<div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Iphone</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php 
	      			foreach ($products as  $value) {
	      		 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="{{$value->slug}}">
					 	<img src="{{ asset('') }}images/feature-pic2.jpg" alt="product"/></a>
					 <h2>{{  Str::limit($value->title, 50, '...') }} </h2>
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
		</div>
    </div>
 </div>
 @endsection