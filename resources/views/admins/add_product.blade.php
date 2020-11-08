@extends('layouts.admin')
@section('title', 'Thêm sản phẩm')
@section('show_box_search', 'none')

@section('content')
<div class="row">
	<div class="col-lg-1"></div>
	<div class="col-lg-10 create-brand">
		<section class="panel">
			<header class="panel-heading">
				Thêm sản phẩm
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
					<form role="form" action="{{route('saveAddProduct')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name">Tên sản phẩm</label>
							<input type="text" class="form-control" id="name" name="name">
						</div>
						<div class="form-group">
							<label for="images">Ảnh</label>
							<input type="file" id="name" name="images">
						</div>
						<div class="form-group">
							<label for="quantity">Số lượng</label>
							<input type="number" class="form-control" id="name" name="quantity">
						</div>
						<div class="form-group">
							<label for="price">Giá</label>
							<input type="number" class="form-control" id="name" name="price">
						</div>
						<div class="form-group">
							<label for="brand">Thương hiệu</label>
							<select name="id_brand" id="brand" class="form-control">
									@foreach ($brands as $brand)
										<option value="{{$brand->id}}">{{$brand->name}}</option>
									@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="category">Danh mục sản phẩm</label>
							<select name="id_category" id="category" class="form-control">
									@foreach ($categorys as $category)
										@if ($category->id_parent != 0)
										<option value="{{$category->id}}">{{$category->name}}</option>
										@endif
									@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="status">Trạng thái</label>
							<select name="status" id="status" class="form-control">
								<option value="1">Hoạt động</option>
								<option value="0">Không hoạt động</option>
							</select>
						</div>
						<div class="form-group">
							<label for="description">Mô tả</label>
							<textarea name="description" id="description" class="form-control ckeditor"></textarea>
						</div>
						<br>
						<br>
						<button type="submit" class="btn btn-info">Lưu sản phẩm</button>
						&emsp;&emsp;&emsp;
						<a class="btn btn-warning" href="{{route('showProducts')}}">Quay lại</a>
					</form>
				</div>
			</div>
		</section>
	</div>
	<div class="col-lg-1"></div>
</div>
@endsection