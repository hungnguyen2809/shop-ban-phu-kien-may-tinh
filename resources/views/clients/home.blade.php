@extends('layouts.client')
@section('title', 'Trang chủ')

@section('content')
    {{-- 1 --}}
	<div class="product-sec1">
		<h3 class="heading-tittle">RAM</h3>
		<?php
			$countProduct = 0;
		?>
		@foreach ($rams as $ram)
		<?php
			$countProduct += 1;
			if ($countProduct == 4) {
				break;
			}
		?>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img style="width: 150px; height: 150px;" src="{{asset('storage/'.$ram->images)}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="{{route('detailsProduct', $ram->id)}}" class="link-product-add-cart">View</a>
						</div>
					</div>
					<span class="product-new-top">Hot</span>
				</div>
				<div class="item-info-product ">
					<h4>
						<a href="{{route('detailsProduct', $ram->id)}}">{{ $ram->name }}</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">{{ number_format($ram->price) }} VND</span>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="Almonds, 100g" />
								<input type="hidden" name="amount" value="149.00" />
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
		</div>
		@endforeach
		<div class="clearfix"></div>
	</div>

	{{-- 2 --}}
	<div class="product-sec1">
		<h3 class="heading-tittle">SSD</h3>
		<?php
			$countProduct = 0;
		?>
		@foreach ($ssds as $ssd)
		<?php
			$countProduct += 1;
			if ($countProduct == 4) {
				break;
			}
		?>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img style="width: 150px; height: 150px;" src="{{asset('storage/'.$ssd->images)}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="{{route('detailsProduct', $ssd->id)}}" class="link-product-add-cart">View</a>
						</div>
					</div>
					<span class="product-new-top">Hot</span>
				</div>
				<div class="item-info-product ">
					<h4>
						<a href="{{route('detailsProduct', $ssd->id)}}">{{ $ssd->name }}</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">{{ number_format($ssd->price) }} VND</span>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="Almonds, 100g" />
								<input type="hidden" name="amount" value="149.00" />
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
		</div>
		@endforeach
		<div class="clearfix"></div>
	</div>
	
	{{-- 3 --}}
	<div class="product-sec1">
		<h3 class="heading-tittle">HHD</h3>
		<?php
			$countProduct = 0;
		?>
		@foreach ($hhds as $hhd)
		<?php
			$countProduct += 1;
			if ($countProduct == 4) {
				break;
			}
		?>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img style="width: 150px; height: 150px;" src="{{asset('storage/'.$hhd->images)}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="{{route('detailsProduct', $hhd->id)}}" class="link-product-add-cart">View</a>
						</div>
					</div>
					<span class="product-new-top">Hot</span>
				</div>
				<div class="item-info-product ">
					<h4>
						<a href="{{route('detailsProduct', $hhd->id)}}">{{ $hhd->name }}</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">{{ number_format($hhd->price) }} VND</span>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="Almonds, 100g" />
								<input type="hidden" name="amount" value="149.00" />
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
		</div>
		@endforeach
		<div class="clearfix"></div>
	</div>

	{{-- 4 --}}
	<div class="product-sec1">
		<h3 class="heading-tittle">USB</h3>
		<?php
			$countProduct = 0;
		?>
		@foreach ($usbs as $usb)
		<?php
			$countProduct += 1;
			if ($countProduct == 4) {
				break;
			}
		?>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img style="width: 150px; height: 150px;" src="{{asset('storage/'.$usb->images)}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="{{route('detailsProduct', $usb->id)}}" class="link-product-add-cart">View</a>
						</div>
					</div>
					<span class="product-new-top">Hot</span>
				</div>
				<div class="item-info-product ">
					<h4>
						<a href="{{route('detailsProduct', $usb->id)}}">{{ $usb->name }}</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">{{ number_format($usb->price) }} VND</span>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="Almonds, 100g" />
								<input type="hidden" name="amount" value="149.00" />
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
		</div>
		@endforeach
		<div class="clearfix"></div>
	</div>
	
	{{-- 5 --}}
	<div class="product-sec1">
		<h3 class="heading-tittle">SD Card</h3>
		<?php
			$countProduct = 0;
		?>
		@foreach ($sdcards as $sdcard)
		<?php
			$countProduct += 1;
			if ($countProduct == 4) {
				break;
			}
		?>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img style="width: 150px; height: 150px;" src="{{asset('storage/'.$sdcard->images)}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="{{route('detailsProduct', $sdcard->id)}}" class="link-product-add-cart">View</a>
						</div>
					</div>
					<span class="product-new-top">Hot</span>
				</div>
				<div class="item-info-product ">
					<h4>
						<a href="{{route('detailsProduct', $sdcard->id)}}">{{ $sdcard->name }}</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">{{ number_format($sdcard->price) }} VND</span>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="Almonds, 100g" />
								<input type="hidden" name="amount" value="149.00" />
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
		</div>
		@endforeach
		<div class="clearfix"></div>
	</div>
@endsection