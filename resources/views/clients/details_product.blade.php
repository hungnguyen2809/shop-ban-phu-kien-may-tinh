@extends('layouts.client')
@section('title', 'Details Product')

@section('content')
<!-- tittle heading -->
<h3 class="tittle-w3l">
	Details Product
	<span class="heading-style">
		<i></i>
		<i></i>
		<i></i>
	</span>
</h3>
<!-- //tittle heading -->
<div class="col-md-5 single-right-left ">
	<div class="grid images_3_of_2">
		<div class="flexslider">
			<img src="{{asset('storage/'.$product->images)}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
		</div>
	</div>
</div>
<div class="col-md-7 single-right-left simpleCart_shelfItem">
	<h3>{{ $product->name }}</h3>
	<div class="rating1">
		<span class="starRating">
			<input id="rating5" type="radio" name="rating" value="5">
			<label for="rating5">5</label>
			<input id="rating4" type="radio" name="rating" value="4">
			<label for="rating4">4</label>
			<input id="rating3" type="radio" name="rating" value="3" checked="">
			<label for="rating3">3</label>
			<input id="rating2" type="radio" name="rating" value="2">
			<label for="rating2">2</label>
			<input id="rating1" type="radio" name="rating" value="1">
			<label for="rating1">1</label>
		</span>
	</div>
	<p>
		<span class="item_price">{{ number_format($product->price) }} VND</span>
	</p>
	<div class="product-single-w3l">
		<p>
			<i class="fa fa-hand-o-right" aria-hidden="true"></i><b>Description:</b>
		</p>
		<br>
		<div>
			@if ($product->description != null)
				{!! $product->description !!}
			@else
				<label for="">The product is not description</label>
			@endif
		</div>
		<br>
		<p>
			<i class="fa fa-refresh" aria-hidden="true"></i>All products are
			<label>returnable.</label>
		</p>
	</div>
	<div class="occasion-cart">
		<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
			<form action="#" method="post">
				<fieldset>
					<input type="hidden" name="cmd" value="_cart" />
					<input type="hidden" name="add" value="1" />
					<input type="hidden" name="business" value=" " />
					<input type="hidden" name="item_name" value="Zeeba Premium Basmati Rice - 5 KG" />
					<input type="hidden" name="amount" value="951.00" />
					<input type="hidden" name="discount_amount" value="1.00" />
					<input type="hidden" name="currency_code" value="USD" />
					<input type="hidden" name="return" value=" " />
					<input type="hidden" name="cancel_return" value=" " />
					<input type="submit" name="submit" value="Add to cart" class="button" />
				</fieldset>
			</form>
		</div>
	</div>
</div>
<div class="clearfix"> </div>
@endsection