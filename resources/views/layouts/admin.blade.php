<!DOCTYPE html>
<head>
	<title>
		@yield('title')
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" >
	<link rel="stylesheet" href="{{ asset('css/app.css') }}" >
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="{{ asset('admin/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{ asset('admin/css/style-responsive.css') }}" rel="stylesheet"/>
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="{{ asset('admin/css/font.css')}}" type="text/css"/>
	<link rel="stylesheet" href="{{asset('admin/css/morris.css')}}" type="text/css"/>
	{{-- <link href="{{asset('admin/css/font-awesome.css')}}" rel="styleshephpet">  --}}
	<script src="{{asset('js/fontawesome.js')}}"></script>
	<!-- calendar -->
	<link rel="stylesheet" href="{{asset('admin/css/monthly.css')}}">
	<!-- //calendar -->
	<!-- //font-awesome icons -->
	<script src="{{ asset('admin/js/jquery2.0.3.min.js') }}"></script>
	<script src="{{ asset('admin/js/raphael-min.js') }}"></script>
	<script src="{{ asset('admin/js/morris.js') }}"></script>

	{{-- CK Editor --}}
	<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
	
</head>
<body>
<section id="container">
	<!--header start-->
	<header class="header fixed-top clearfix">
	<!--logo start-->
	<div class="brand">
		<a href="{{ route('home') }}" class="logo">
			Phụ kiện
		</a>
		<div class="sidebar-toggle-box">
			<div class="fa fa-bars"></div>
		</div>
	</div>
	<!--logo end-->

	<div class="top-nav clearfix">
		<!--search & user info start-->
		<ul class="nav pull-right top-menu">
			<li>
				<form action="" method="GET" style="display: @yield('show_box_search')">
					{{-- @csrf --}}
					<div style="display: flex">
						<input autofocus type="text" class="form-control" name="keystring" placeholder="Tìm kiếm" value="@if(isset($keystring)) {{ trim($keystring) }} @endif">
						<input type="submit" value="Tìm kiếm" class="btn btn-success" style="margin-left: 10px; margin-right: 10px">	
					</div>
				</form>
			</li>
			<!-- user login dropdown start-->
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
					<img alt="" src="{{asset('admin/images/2.png')}}">
					<span class="username">
						@if (Auth::check())
							{{ Auth::user()->name }}
						@endif
					</span>
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu extended logout">
					<li><a onclick="return confirm('Bạn có chắc muốn đăng xuất không ?')" href="{{route('logoutUser')}}"><i class="fa fa-key"></i>Đăng xuất</a></li>
				</ul>
			</li>
			<!-- user login dropdown end -->		
		</ul>
		<!--search & user info end-->
	</div>
	</header>
	<!--header end-->
	<!--sidebar start-->
	<aside>
		<div id="sidebar" class="nav-collapse">
			<!-- sidebar menu start-->
			<div class="leftside-navigation">
				<ul class="sidebar-menu" id="nav-accordion">
					<li>
						<a class="active" href="{{route('quanTri')}}">
							<i class="fa fa-dashboard"></i>
							<span>Quản trị</span>
						</a>
					</li>
					
					<li class="sub-menu">
						<a href="javascript:;">
							<i class="fa fa-book"></i>
							<span>Sản phẩm</span>
						</a>
						<ul class="sub">
							<li><a href="{{route('showProducts')}}">Xem sản phẩm</a></li>
							<li><a href="{{route('addProduct')}}">Thêm mới</a></li>
						</ul>
					</li>

					<li class="sub-menu">
						<a href="javascript:;">
							<i class="fas fa-american-sign-language-interpreting"></i>
							<span>Danh mục sản phẩm</span>
						</a>
						<ul class="sub">
							<li><a href="{{route('showCategorys')}}"><i class="fas fa-ankh"></i>Xem danh mục</a></li>
							<li><a href="{{route('addCategory')}}"><i class="fas fa-ankh"></i>Thêm mới danh mục</a></li>
							<li><a href="{{route('showCategoryParents')}}"><i class="fas fa-archway"></i></i>Xem danh mục gốc</a></li>
							<li><a href="{{route('addCategoryParent')}}"><i class="fas fa-archway"></i></i>Thêm mới danh mục gốc</a></li>
						</ul>
					</li>

					<li class="sub-menu">
						<a href="javascript:;">
							<i class="far fa-address-card"></i>
							<span>Thương hiệu</span>
						</a>
						<ul class="sub">
							<li><a href="{{route('showBrands')}}">Xem thương hiệu</a></li>
							<li><a href="{{route('addBrand')}}">Thêm mới</a></li>
						</ul>
					</li>
					
					<li class="sub-menu">
						<a href="{{route('showUsers')}}">
							<i class="fa fa-user"></i>
							<span>Người dùng</span>
						</a>
						<ul class="sub">
							<li><a href="{{route('showUsers')}}">Xem người dùng</a></li>
							<li><a href="{{route('addUser')}}">Thêm mới tài khoản</a></li>
						</ul>
					</li>
					<li>
						<a href="{{ route('showOrders') }}">
							<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
							<span>Xem đơn hàng</span>
						</a>
					</li>
				</ul>           
			</div>
			<!-- sidebar menu end-->
		</div>
	</aside>
	<!--sidebar end-->
	<!--main content start-->
	<section id="main-content">
		<section class="wrapper">

            {{-- Content --}}
			@yield('content')

		</section>

	<!-- footer -->
		<div class="footer">
			<div class="wthree-copyright text-center">
				<p>© {{ date("Y") }} - Phụ kiện siêu rẻ</p>
			</div>
		</div>
	<!-- / footer -->
	</section>
	<!--main content end-->
</section>



	<script src="{{asset('admin/js/bootstrap.js')}}"></script>
	<script src="{{asset('admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
	<script src="{{asset('admin/js/scripts.js')}}"></script>
	<script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('admin/js/jquery.nicescroll.js')}}"></script>
	<script src="{{asset('admin/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
