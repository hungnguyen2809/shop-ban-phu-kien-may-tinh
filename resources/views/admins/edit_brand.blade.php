@extends('layouts.admin')
@section('title', 'Cập nhật thương hiệu')
@section('show_box_search', 'none')

@section('content')
<div class="row">
	<div class="col-lg-1"></div>
	<div class="col-lg-10 create-brand">
		<section class="panel">
			<header class="panel-heading">
				Cập nhật thương hiệu
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
						<h3 class="text-center">Cập nhật thất bại</h3>
						<br>
						@foreach ($errors->all() as $err)
							<p style="font-size: 16px"> - {{ $err }}</p>
						@endforeach
					</div>
				@endif
				<div class="position-center">
					<form role="form" action="{{route('saveEditBrand', $brand->id)}}" method="POST">
						@csrf
						<div class="form-group">
							<label for="name">Tên thương hiệu</label>
							<input type="text" class="form-control" id="name" name="name" value="{{$brand->name}}">
						</div>
						<div class="form-group">
							<label for="description">Mô tả</label>
							<textarea name="description" id="description" class="form-control ckeditor">{{$brand->description}}</textarea>
						</div>
						<div class="form-group">
							<label for="status">Trạng thái</label>
							<select name="status" id="status" class="form-control">
								<option @if($brand->status == 1) selected @endif value="1">Hoạt động</option>
								<option @if($brand->status == 0) selected @endif value="0">Không hoạt động</option>
							</select>
						</div>
						<br>
						<br>
						<button type="submit" class="btn btn-info">Lưu thương hiệu</button>
						&emsp;&emsp;&emsp;
						<a class="btn btn-warning" href="{{route('showBrands')}}">Quay lại</a>
					</form>
				</div>
			</div>
		</section>
	</div>
	<div class="col-lg-1"></div>
</div>
@endsection