@extends('layouts.admin')
@section('title', 'Phụ kiện siêu rẻ')	
@section('show_box_search', 'none')

@section('content')
<!-- //market-->
<div class="market-updates">
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-2">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-eye"> </i>
			</div>
			<div class="col-md-8 market-update-left">
			<h4>Lượt truy cập</h4>
			<h3>13,500</h3>
		</div>
		<div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-1">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-users" ></i>
			</div>
			<div class="col-md-8 market-update-left">
			<h4>Số người dùng</h4>
				<h3>{{ number_format(count($users)) }}</h3>
			</div>
		<div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-4">
			<div class="col-md-4 market-update-right">
				<i class="fa fa-shopping-cart" aria-hidden="true"></i>
			</div>
			<div class="col-md-8 market-update-left">
				<h4>Số đơn hàng</h4>
				<h3>{{ count($orders) }}</h3>
			</div>
		<div class="clearfix"> </div>
		</div>
	</div>
	<div class="col-md-3 market-update-gd">
		<div class="market-update-block clr-block-3">
			<div class="col-md-4 market-update-right">
				<i class="fas fa-hockey-puck fa-3x" style="color: white"></i>
			</div>
			<div class="col-md-8 market-update-left">
				<h4>Số sản phẩm</h4>
				<h3>{{ number_format(count($products)) }}</h3>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="clearfix"> </div>
</div>	
<!-- //market-->

@endsection