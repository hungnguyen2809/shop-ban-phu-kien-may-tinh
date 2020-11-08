@extends('layouts.admin')

@section('title', 'Danh sách sản phẩm')
@section('show_box_search', 'block')

@section('content')
<div class="row">
	<div class="col-lg-1"></div>
    <div class="table-agile-info col-lg-10">
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
        <div class="panel panel-default" style="padding: 2px 2px 15px;">
            <div class="panel-heading">
                Danh sách sản phẩm
            </div>
            @if (count($products) > 0)
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
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Danh mục</th>
                            <th>Trạng thái</th>
                            <th style="width: 200px;">Ngày cập nhật</th>
                            <th style="width: 150px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <img style="height: 100px; width: auto;" src="{{asset('storage/'.$product->images)}}" alt="{{$product->alias}}">
                                </td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ number_format($product->price) }}-VND</td>
                                <td>
                                    @foreach ($categorys as $cate)
                                        @if ($cate->id == $product->id_category)
                                            {{ $cate->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @if ($product->status)
                                        <span class="text-success">Hoạt động</span>
                                    @else
                                        <span class="text-danger">Không hoạt động</span>
                                    @endif
                                </td>
                                <td>{{ $product->updated_at }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('editProduct', $product->id)}}">Sửa</a> - 
                                    <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm {{$product->name}} ?')" class="btn btn-danger" href="{{route('deleteProduct', $product->id)}}">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $products->links() !!}
            </div>
            @else
            <br>
            <div class="alert alert-warning text-center">
                <h3>Không có sản phẩm được lưu trữ</h3>
            </div>
            <a style="margin-left: 20px" class="btn btn-info" href="{{route('addProduct')}}">Thêm mới ngay</a>
            @endif
        </div>
    </div>
	<div class="col-lg-1"></div>
</div>
@endsection