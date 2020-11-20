@extends('layouts.client')
@section('title', 'ABC')

@section('content')
<div class="product-sec1">
	<h3 class="heading-tittle">
		@if (isset($brand))
			{{ $brand->name }}
		@endif
		@if (isset($category))
			{{ $category->name }}
		@endif
	</h3>
	@foreach ($data as $item)		
	<div class="col-md-4 product-men">
		<div class="men-pro-item simpleCart_shelfItem">
			<div class="men-thumb-item">
				<img style="width: 150px; height: 150px;" src="{{asset('storage/'.$item->images)}}" alt="">
				<div class="men-cart-pro">
					<div class="inner-men-cart-pro">
						<a href="{{route('detailsProduct', $item->id)}}" class="link-product-add-cart">View</a>
					</div>
				</div>
				<span class="product-new-top">Hot</span>
			</div>
			<div class="item-info-product ">
				<h4>
					<a href="{{route('detailsProduct', $item->id)}}">{{ $item->name }}</a>
				</h4>
				<div class="info-product-price">
					<span class="item_price">{{ number_format($item->price) }} VND</span>
				</div>
				<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
					<form action="#" method="post">
						<fieldset>
							<input type="hidden" name="cmd" value="_cart" />
							<input type="hidden" name="add" value="1" />
							<input type="hidden" name="business" value=" " />
							<input type="hidden" name="item_name" value="{{ $item->name }}" />
							<input type="hidden" name="amount" value="{{ $item->price }}" />
							<input type="hidden" name="discount_amount" value="0" />
							<input type="hidden" name="currency_code" value="VND" />
							<input type="hidden" name="return" value=" " />
							<input type="hidden" name="cancel_return" value=" " />
							<input type="submit" name="submit" value="Add to cart" class="button" />
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endforeach
	<div class="clearfix"></div>
</div>
<div style="margin: 10px;">
	{!! $data->links() !!}
</div>
@endsection