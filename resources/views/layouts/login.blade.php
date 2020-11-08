<!DOCTYPE html>
<head>
	<title>Đăng nhập</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}" >
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="{{asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet"/>
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="{{asset('admin/css/font.css')}}" type="text/css"/>
	{{-- <link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet">  --}}
	<script src="{{asset('js/fontawesome.js')}}"></script>
	<!-- //font-awesome icons -->
	<script src="{{asset('admin/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
	<div class="log-w3">
		<div class="w3layouts-main">
				@if (session("error"))
							<div class="position-center alert alert-danger text-center">
								<h3>{{session("error")}}</h3>
							</div>
				@endif
				@if (count($errors) > 0)
					<div class="position-center alert alert-danger">
						<h3 class="text-center">Tạo tài khoản thất bại</h3>
						<br>
						@foreach ($errors->all() as $err)
							<div style="font-size: 16px"> - {{ $err }}</div>
						@endforeach
					</div>
				@endif
			<h2>Đăng nhập ngay</h2>
				<form action="{{route('submitLoginUser')}}" method="post">
					@csrf
					<input type="email" class="ggg" name="email" placeholder="E-MAIL" required="">
					<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
					<span><input type="checkbox" name="remember"/> Nhớ tài khoản</span>
					<h6><a href="#">Quyên mật khẩu ?</a></h6>
					<div class="clearfix"></div>
					<input type="submit" value="Đăng nhập" name="login">
				</form>
				<p>Không có tài khoản ?<a href="{{route('registerUser')}}">Tạo tài khoản</a></p>
		</div>
	</div>
	<script src="{{asset('admin/js/bootstrap.js')}}"></script>
	<script src="{{asset('admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
	<script src="{{asset('admin/js/scripts.js')}}"></script>
	<script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
	<script src="{{asset('admin/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
