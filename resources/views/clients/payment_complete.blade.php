@extends('layouts.client')
@section('title', 'Payment Sucess')

@section('content')
<h3 class="tittle-w3l">Sucess Payment
	<span class="heading-style">
		<i></i>
		<i></i>
		<i></i>
	</span>
</h3>
<!-- //tittle heading -->
{{-- <div class="checkout-right">
	<div class="table-responsive">
		<table class="timetable_sub">
			<thead>
				<tr>
					<th>SL No.</th>
					<th>Product</th>
					<th>Quality</th>
					<th>Product Name</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$count = 1;	
					$total = 0;
				?>
				@foreach ($products as $product)
				<tr class="rem1">
					<td class="invert">{{ $count++ }}</td>
					<td class="invert-image" style="display: flex;justify-content: center;">
						<img style="width: 150px; height: auto;" src="{{ asset('storage/'.$product->images) }}" alt="images-product" class="img-responsive">
					</td>
					<td class="invert">
						@foreach ($data as $item)
							@if ($item['id'] == $product['id'])
								<span>{{ $item['quantity'] }}</span>
							@endif
						@endforeach
					</td>
					<td class="invert">{{ $product['name'] }}</td>
					<td class="invert">
						<?php
							foreach ($data as $item) {
								if ($item['id'] == $product['id']) {
									$price = $item['quantity']*$product['price'];
									$total += $price;
									$price = number_format($price);
									echo("<sapn>$price</sapn>");
								}
							}
						?>
					</td>
				</tr>	
				@endforeach
			</tbody>
		</table>
		<div style="margin-top: 20px;">
			<b style="font-size: 30px">Total price: </b> 
			<b style="font-size: 30px">{{	number_format($total) }} VND</b>
		</div>
	</div>
</div>
<div class="checkout-left">
	<div class="address_form_agile">
		<h4>Information of You</h4>
		<form action="{{ route('submitPaymentCart', ["data"=>$data]) }}" method="post" class="creditly-card-form agileinfo_form">
			@csrf
			<div class="creditly-wrapper wthree, w3_agileits_wrapper">
				<div class="information-wrapper">
					<div class="first-row">
						<div class="controls">
							<input class="billing-address-name" type="text" name="name" placeholder="Full Name" required="">
						</div>
						<div class="w3_agileits_card_number_grids">
							<div class="w3_agileits_card_number_grid_left">
								<div class="controls">
									<input type="text" placeholder="Mobile Number" name="number" required="">
								</div>
							</div>
							<div class="w3_agileits_card_number_grid_right">
								<div class="controls">
									<input type="email" placeholder="Email" name="email" required="">
								</div>
							</div>
							<div class="clear"> </div>
							<div class="w3_agileits_card_number_grid_right">
								<div class="controls">
									<input type="text" placeholder="Address" name="address" required="">
								</div>
							</div>
							<div class="clear"> </div>
						</div>
						<div class="controls">
							<input type="text" placeholder="Note" name="note">
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="clearfix"> </div>
</div> --}}
@endsection