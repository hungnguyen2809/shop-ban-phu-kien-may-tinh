@extends('layouts.client')
@section('title', 'Trang chủ')

@section('content')
    {{-- 1 --}}
	<div class="product-sec1">
		<h3 class="heading-tittle">RAM {{count($rams)}}</h3>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img src="{{asset('client/images/m1.jpg')}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="single.html" class="link-product-add-cart">Chi tiết</a>
						</div>
					</div>
					<span class="product-new-top">New</span>
				</div>
				<div class="item-info-product ">
					<h4>
						<a href="single.html">Almonds, 100g</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">$149.00</span>
						<del>$280.00</del>
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
								<input type="submit" name="submit" value="Thêm vào giỏ" class="button" />
							</fieldset>
						</form>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img src="{{asset('client/images/m2.jpg')}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="single.html" class="link-product-add-cart">Chi tiết</a>
						</div>
					</div>
					<span class="product-new-top">New</span>

				</div>
				<div class="item-info-product ">
					<h4>
						<a href="single.html">Cashew Nuts, 100g</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">$200.00</span>
						<del>$420.00</del>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="Cashew Nuts, 100g" />
								<input type="hidden" name="amount" value="200.00" />
								<input type="hidden" name="discount_amount" value="1.00" />
								<input type="hidden" name="currency_code" value="USD" />
								<input type="hidden" name="return" value=" " />
								<input type="hidden" name="cancel_return" value=" " />
								<input type="submit" name="submit" value="Thêm vào giỏ" class="button" />
							</fieldset>
						</form>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img src="{{asset('client/images/m3.jpg')}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="single.html" class="link-product-add-cart">Chi tiết</a>
						</div>
					</div>
					<span class="product-new-top">New</span>

				</div>
				<div class="item-info-product ">
					<h4>
						<a href="single.html">Pista..., 250g</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">$520.99</span>
						<del>$600.99</del>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="Pista, 250g" />
								<input type="hidden" name="amount" value="520.99" />
								<input type="hidden" name="discount_amount" value="1.00" />
								<input type="hidden" name="currency_code" value="USD" />
								<input type="hidden" name="return" value=" " />
								<input type="hidden" name="cancel_return" value=" " />
								<input type="submit" name="submit" value="Thêm vào giỏ" class="button" />
							</fieldset>
						</form>
					</div>

				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	{{-- 2 --}}
	<div class="product-sec1">
		<h3 class="heading-tittle">Oils</h3>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img src="{{asset('client/images/mk4.jpg')}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="single.html" class="link-product-add-cart">Chi tiết</a>
						</div>
					</div>
					<span class="product-new-top">New</span>
				</div>
				<div class="item-info-product ">
					<h4>
						<a href="single.html">Freedom Oil, 1L</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">$78.00</span>
						<del>$110.00</del>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="Freedom Sunflower Oil, 1L" />
								<input type="hidden" name="amount" value="78.00" />
								<input type="hidden" name="discount_amount" value="1.00" />
								<input type="hidden" name="currency_code" value="USD" />
								<input type="hidden" name="return" value=" " />
								<input type="hidden" name="cancel_return" value=" " />
								<input type="submit" name="submit" value="Thêm vào giỏ" class="button" />
							</fieldset>
						</form>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img src="{{asset('client/images/mk5.jpg')}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="single.html" class="link-product-add-cart">Chi tiết</a>
						</div>
					</div>
					<span class="product-new-top">New</span>

				</div>
				<div class="item-info-product ">
					<h4>
						<a href="single.html">Saffola Gold, 1L</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">$130.00</span>
						<del>$150.00</del>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="Saffola Gold, 1L" />
								<input type="hidden" name="amount" value="130.00" />
								<input type="hidden" name="discount_amount" value="1.00" />
								<input type="hidden" name="currency_code" value="USD" />
								<input type="hidden" name="return" value=" " />
								<input type="hidden" name="cancel_return" value=" " />
								<input type="submit" name="submit" value="Thêm vào giỏ" class="button" />
							</fieldset>
						</form>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img src="{{asset('client/images/mk6.jpg')}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="single.html" class="link-product-add-cart">Chi tiết</a>
						</div>
					</div>
					<span class="product-new-top">New</span>

				</div>
				<div class="item-info-product ">
					<h4>
						<a href="single.html">Fortune Oil, 5L</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">$399.99</span>
						<del>$500.00</del>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="Fortune Oil, 5L" />
								<input type="hidden" name="amount" value="399.99" />
								<input type="hidden" name="discount_amount" value="1.00" />
								<input type="hidden" name="currency_code" value="USD" />
								<input type="hidden" name="return" value=" " />
								<input type="hidden" name="cancel_return" value=" " />
								<input type="submit" name="submit" value="Thêm vào giỏ" class="button" />
							</fieldset>
						</form>
					</div>

				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	{{-- 3 --}}
	<div class="product-sec1">
		<h3 class="heading-tittle">Pasta & Noodles</h3>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img src="{{asset('client/images/mk7.jpg')}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="single.html" class="link-product-add-cart">Chi tiết</a>
						</div>
					</div>
				</div>
				<div class="item-info-product ">
					<h4>
						<a href="single.html">Yippee Noodles, 65g</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">$15.00</span>
						<del>$25.00</del>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="YiPPee Noodles, 65g" />
								<input type="hidden" name="amount" value="15.00" />
								<input type="hidden" name="discount_amount" value="1.00" />
								<input type="hidden" name="currency_code" value="USD" />
								<input type="hidden" name="return" value=" " />
								<input type="hidden" name="cancel_return" value=" " />
								<input type="submit" name="submit" value="Thêm vào giỏ" class="button" />
							</fieldset>
						</form>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img src="{{asset('client/images/mk8.jpg')}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="single.html" class="link-product-add-cart">Chi tiết</a>
						</div>
					</div>
					<span class="product-new-top">New</span>

				</div>
				<div class="item-info-product ">
					<h4>
						<a href="single.html">Wheat Pasta, 500g</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">$98.00</span>
						<del>$120.00</del>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="Wheat Pasta, 500g" />
								<input type="hidden" name="amount" value="98.00" />
								<input type="hidden" name="discount_amount" value="1.00" />
								<input type="hidden" name="currency_code" value="USD" />
								<input type="hidden" name="return" value=" " />
								<input type="hidden" name="cancel_return" value=" " />
								<input type="submit" name="submit" value="Thêm vào giỏ" class="button" />
							</fieldset>
						</form>
					</div>

				</div>
			</div>
		</div>
		<div class="col-md-4 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img src="{{asset('client/images/mk9.jpg')}}" alt="">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="single.html" class="link-product-add-cart">Chi tiết</a>
						</div>
					</div>
					<span class="product-new-top">New</span>

				</div>
				<div class="item-info-product ">
					<h4>
						<a href="single.html">Chinese Noodles, 68g</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">$11.99</span>
						<del>$15.00</del>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" />
								<input type="hidden" name="business" value=" " />
								<input type="hidden" name="item_name" value="Chinese Noodles, 68g" />
								<input type="hidden" name="amount" value="11.99" />
								<input type="hidden" name="discount_amount" value="1.00" />
								<input type="hidden" name="currency_code" value="USD" />
								<input type="hidden" name="return" value=" " />
								<input type="hidden" name="cancel_return" value=" " />
								<input type="submit" name="submit" value="Thêm vào giỏ" class="button" />
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
@endsection