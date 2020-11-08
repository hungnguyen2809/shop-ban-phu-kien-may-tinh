@extends('layouts.admin')
@section('title', 'Thêm sản phẩm')
@section('show_box_search', 'none')

@section('content')
<div class="row">
	<div class="col-lg-1"></div>
	<div class="col-lg-10 create-brand">
		<section class="panel">
			<header class="panel-heading">
				Cập nhật sản phẩm
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
					<form role="form" action="{{route('saveEditProduct', $product->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name">Tên sản phẩm</label>
							<input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
						</div>
						<div class="form-group">
							<label for="images">Ảnh</label>
							<input type="file" id="name" name="images">
							<img src="{{asset('storage/'.$product->images)}}" alt="" style="height: 100px; width: auto">
						</div>
						<div class="form-group">
							<label for="quantity">Số lượng</label>
							<input type="number" class="form-control" id="name" name="quantity" value="{{$product->quantity}}">
						</div>
						<div class="form-group">
							<label for="price">Giá</label>
							<input type="number" class="form-control" id="name" name="price" value="{{$product->price}}">
						</div>
						<div class="form-group">
							<label for="brand">Thương hiệu</label>
							<select name="id_brand" id="brand" class="form-control">
									@foreach ($brands as $brand)
										<option @if($product->id_brand == $brand->id) selected @endif value="{{$brand->id}}">{{$brand->name}}</option>
									@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="category">Danh mục sản phẩm</label>
							<select name="id_category" id="category" class="form-control">
									@foreach ($categorys as $category)
										@if ($category->id_parent != 0)
											<option @if($product->id_category == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
										@endif
									@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="status">Trạng thái</label>
							<select name="status" id="status" class="form-control">
								<option @if($product->status == 1) selected @endif value="1">Hoạt động</option>
								<option @if($product->status == 0) selected @endif value="0">Không hoạt động</option>
							</select>
						</div>
						<div class="form-group">
							<label for="description">Mô tả</label>
							<textarea name="description" id="description" class="form-control ckeditor">{{$product->description}}</textarea>
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