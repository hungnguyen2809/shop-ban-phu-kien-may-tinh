@extends('layouts.admin')

@section('title', 'Danh sách thương hiệu')
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
                Danh sách thương hiệu
            </div>
            @if (count($brands) > 0)
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
                            <th>Tên thương hiệu</th>
                            <th>Alias</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th style="width: 200px;">Ngày tạo</th>
                            <th style="width: 150px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->alias }}</td>
                                <td>
                                    @if ($brand->description != null)
                                        {!! $brand->description !!}
                                    @else
                                        <span>Không có mô tả</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($brand->status)
                                        <span class="text-success">Hoạt động</span>
                                    @else
                                        <span class="text-danger">Không hoạt động</span>
                                    @endif
                                </td>
                                <td>{{ $brand->created_at }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('editBrand', $brand->id)}}">Sửa</a> - 
                                    <a onclick="return confirm('Bạn có chắc muốn xóa thương hiệu {{$brand->name}} ?')" class="btn btn-danger" href="{{route('deleteBrand', $brand->id)}}">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $brands->links() !!}
            </div>
            @else
            <br>
            <div class="alert alert-warning text-center">
                <h3>Không có thương hiệu được lưu trữ</h3>
            </div>
            <a style="margin-left: 20px" class="btn btn-info" href="{{route('addBrand')}}">Thêm mới ngay</a>
            @endif
        </div>
    </div>
	<div class="col-lg-1"></div>
</div>
@endsection