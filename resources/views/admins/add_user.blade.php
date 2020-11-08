@extends('layouts.admin')
@section('title', 'Thêm tài khoản')
@section('show_box_search', 'none')

@section('content')
<div class="row">
	<div class="col-lg-1"></div>
	<div class="col-lg-10 create-brand">
		<section class="panel">
			<header class="panel-heading">
				Thêm mới tài khoản
			</header>
			<div class="panel-body">
				@if (session("success"))
					<div class="position-center alert alert-success text-center">
						<h3>{{session("success")}}</h3>
					</div>
				@endif
				@if (session("error"))
					<div class="position-center alert alert-danger text-center">
						<h3>{{session("error")}}</h3>
					</div>
				@endif
				
				@if (count($errors) > 0)
					<div class="position-center alert alert-danger">
						<h3 class="text-center">Thêm thất bại</h3>
						<br>
						@foreach ($errors->all() as $err)
							<p style="font-size: 16px"> - {{ $err }}</p>
						@endforeach
					</div>
				@endif
				<div class="position-center">
					<form role="form" action="{{route('saveAddUser')}}" method="POST">
						@csrf
						<div class="form-group">
							<label for="name">Tên hiển thị <span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="name" name="name" required>
						</div>
						<div class="form-group">
							<label for="email">Địa chỉ email <span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="email" name="email" required>
						</div>
						<div class="form-group">
							<label for="password">Mật khẩu <span class="text-danger">*</span></label>
							<input type="password" class="form-control" id="password" name="password" required>
						</div>
						<div class="form-group">
							<label for="repassword">Nhập lại mật khẩu <span class="text-danger">*</span></label>
							<input type="password" class="form-control" id="repassword" name="repassword" required>
						</div>
						<div class="form-group">
							<label for="phone">Số điện thoại</label>
							<input type="text" class="form-control" id="phone" name="phone">
						</div>
						<div class="form-group">
							<label for="address">Địa chỉ</label>
							<input type="text" class="form-control" id="address" name="address">
						</div>
						<div class="form-group">
							<label for="permission">Quyền hạn</label>
							<select name="permission" id="permission" class="form-control">
								<option value="1">Quản trị</option>
								<option value="0">Người dùng</option>
							</select>
						</div>
						<div class="form-group">
							<label for="status">Trạng thái</label>
							<select name="status" id="status" class="form-control">
								<option value="1">Hoạt động</option>
								<option value="0">Không hoạt động</option>
							</select>
						</div>
						<br>
						<br>
						<button type="submit" class="btn btn-info">Tạo tài khoản</button>
						&emsp;&emsp;&emsp;
						<a class="btn btn-warning" href="{{route('showUsers')}}">Quay lại</a>
					</form>
				</div>
			</div>
		</section>
	</div>
	<div class="col-lg-1"></div>
</div>
@endsection