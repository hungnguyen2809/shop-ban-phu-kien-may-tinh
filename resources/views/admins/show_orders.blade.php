@extends('layouts.admin')

@section('title', 'Danh sách đơn hàng')
@section('show_box_search', 'block')

@section('content')
<div class="row">
	<div class="col-lg-1"></div>
    <div class="table-agile-info col-lg-10">
        <div class="panel panel-default" style="padding: 2px 2px 15px;">
            <div class="panel-heading">
                Danh sách đơn hàng
            </div>
            @if (count($orders) > 0)
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
							<th>Người nhận</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ghi chú</th>
                            <th>Trạng thái</th>
                            <th style="width: 200px;">Ngày tạo</th>
                            <th style="width: 150px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->note }}</td>
                                <td>{!! $order->status ? '<span style="color: green">Thành công</span>' : '<span style="color: red">Đang chờ</span>' !!}</td>
								<td>{{ $order->created_at}}</td>
								<td>
									<a href="{{route('showOrderDetails', $order->id)}}" class="btn btn-danger">Chi tiết</a>
								</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $orders->links() !!}
            </div>
            @else
            <br>
            <div class="alert alert-warning text-center" >
                <h3>Chưa có đơn hàng nào ?</h3>
            </div>
            @endif
        </div>
    </div>
	<div class="col-lg-1"></div>
</div>
@endsection