@extends('layouts.admin')

@section('title', 'Danh mục sản phẩm')
@section('show_box_search', 'block')

@section('content')
<div class="row">
	<div class="col-lg-1"></div>
    <div class="table-agile-info col-lg-10">
        <div class="panel panel-default" style="padding: 2px 2px 15px;">
            <div class="panel-heading">
                Danh mục sản phẩm gốc
            </div>
            @if (count($categoryParents) > 0)
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
                            <th>Tên danh mục</th>
                            <th>Alias</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th style="width: 200px;">Ngày tạo</th>
                            <th style="width: 150px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoryParents as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->alias }}</td>
                            <td>
                                @if ($category->description != null)
                                    {!! $category->description !!}
                                @else
                                    <span>Không có mô tả</span>
                                @endif
                            </td>
                            <td>
                                @if ($category->status)
                                    <span class="text-success">Hoạt động</span>
                                @else
                                    <span class="text-danger">Không hoạt động</span>
                                @endif
                            </td>
                            <td>{{ $category->created_at }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route('editCategoryParent', $category->id)}}">Sửa</a> - 
                                <a onclick="return confirm('Bạn có chắc muốn xóa danh mục {{$category->name}} ?')" class="btn btn-danger" href="{{route('deleteCategoryParent', $category->id)}}">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $categoryParents->links() !!}
            </div>
            @else
            <br>
            <div class="alert alert-warning text-center">
                <h3>Không có danh mục sản phẩm được lưu trữ</h3>
            </div>
            <a style="margin-left: 20px" class="btn btn-info" href="{{route('addCategoryParent')}}">Thêm mới ngay</a>
            @endif
        </div>
    </div>
	<div class="col-lg-1"></div>
</div>
@endsection