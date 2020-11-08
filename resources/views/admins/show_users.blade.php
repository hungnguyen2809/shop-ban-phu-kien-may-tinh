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
                Danh sách người dùng
            </div>
            @if (count($users) > 0)
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
                            <th>Tên hiển thị</th>
                            <th>Email</th>
                            <th>Điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Quyền hạn</th>
                            <th>Trạng thái</th>
                            <th style="width: 200px;">Ngày cập nhật</th>
                            <th style="width: 150px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if ($user->phone != null)
                                    {!! $user->phone !!}
                                @else
                                    <span>Không có dữ liệu</span>
                                @endif
                            </td>
                            <td>
                                @if ($user->address != null)
                                    {!! $user->address !!}
                                @else
                                    <span>Không có dữ liệu</span>
                                @endif
                            </td>
                            <td>
                                @if ($user->permission == 1)
                                    <span class="text-danger">Quản trị</span>
                                @else
                                    <span class="text-primary">Người dùng</span>
                                @endif
                            </td>
                            <td>
                                @if ($user->status)
                                    <span class="text-success">Hoạt động</span>
                                @else
                                    <span class="text-danger">Không hoạt động</span>
                                @endif
                            </td>
                            <td>{{$user->updated_at}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route('editUser', $user->id)}}">Sửa</a> - 
                                <a onclick="return confirm('Bạn có chắc muốn xóa tài khoản {{$user->email}} ?')" class="btn btn-danger" href="{{route('deleteUser', $user->id)}}">Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $users->links() !!}
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