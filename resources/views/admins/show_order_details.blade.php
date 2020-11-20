@extends('layouts.admin')

@section('title', 'Chi tiết đơn hàng')
@section('show_box_search', 'none')

@section('content')
<div class="row">
	<div class="col-lg-1"></div>
    <div class="table-agile-info col-lg-10">
        <div class="panel panel-default" style="padding: 2px 2px 15px;">
            <div class="panel-heading">
                Thông tin khách hàng
            </div>
            <div class="position-center">
				<form style="margin-top: 20px;">
					<div class="form-group">
						<label for="name">Tên khách hàng</label>
						<input type="text" class="form-control" id="name" name="name" disabled value="{{ $orders->name }}">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" disabled value="{{ $orders->email }}">
					</div>
					<div class="form-group">
						<label for="phone">Số điện thoại</label>
						<input type="text" class="form-control" id="phone" name="phone" disabled value="{{ $orders->phone }}">
					</div>
					<div class="form-group">
						<label for="address">Địa chỉ</label>
						<input type="text" class="form-control" id="address" name="address" disabled value="{{ $orders->address }}">
					</div>					
				</form>
			</div>
        </div>
    </div>
	<div class="col-lg-1"></div>
</div>
<div class="row">
	<div class="col-lg-1"></div>
    <div class="table-agile-info col-lg-10">
        <div class="panel panel-default" style="padding: 2px 2px 15px;">
            <div class="panel-heading">
                Chi tiết đơn hàng
            </div>
            <div>
                <table class="table table-bordered" ui-jq="footable" ui-options='{
                "paging": {
                    "enabled": true
                },
                "filtering": {
                    "enabled": true
                },
                "sorting": {
                    "enabled": true
                }}'>
                    <thead>
                        <tr>
							<th>SL No.</th>
							<th>Product Name</th>
							<th>Image</th>
							<th>Warranty Preiod</th>
							<th>Sale</th>
							<th>Quality</th>
							<th>Price</th>
						</tr>
                    </thead>
                    <tbody>
                        <?php
							$count = 1;	
							$total = 0;
						?>
						@foreach ($orderdetails as $order)
						<tr>
							<td>{{ $count++ }}</td>
							<td>
								@foreach ($products as $product)
									@if ($product->id == $order->id_product)
										<span>{{ $product->name }}</span>
									@endif
								@endforeach
							</td>
							<td>
								@foreach ($products as $product)
									@if ($product->id == $order->id_product)
										<img style="height: 100px; width: auto;" src="{{asset('storage/'.$product->images)}}" alt="{{$product->alias}}">
									@endif
								@endforeach
							</td>
							<td>{{ $order->warranty_preiod }}</td>
							<td>{{ $order->sale }} %</td>
							<td>{{ $order->quantity }}</td>
							<td>
								<?php
									$price = $order->quantity * $order->price;
									$total += $price;
									$price = number_format($price);
									echo("<sapn>$price</sapn>");
								?>
							</td>
						</tr>	
						@endforeach
                    </tbody>
				</table>
				<div style="margin-top: 20px; display: flex; justify-content: space-between">
					<div>
						&emsp;<a class="btn btn-primary" href="{{ route('showOrders') }}">Quay lại</a>
					</div>
					<div>
						<b style="font-size: 20px">Total price: &emsp;</b> 
						<b style="font-size: 20px">{{ number_format($total) }} VND 	&emsp;</b>
					</div>
				</div>
            </div>
        </div>
    </div>
	<div class="col-lg-1"></div>
</div>
@endsection