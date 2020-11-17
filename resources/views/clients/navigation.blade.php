<?php
  use App\Models\BrandModel;
  use App\Models\CategoryModel;
  $brands = BrandModel::all();
  $categorys = CategoryModel::where('id_parent', '!=', 0)->orderBy('name')->get();

  $numberPage = 13;
  $count = 0;
  $categoryLefts = array();
  $categoryRights = array();

  foreach ($categorys as $cate) {
    if (count($categoryLefts) != $numberPage) {
      array_push($categoryLefts, $cate);
    }
    else {
      array_push($categoryRights, $cate);
    }
  }
?>

<div class="top_nav_left">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
          aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav menu__list">
          <li class="active">
            <a class="nav-stylehead" href="index.html">
              Trang chủ
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Sản phẩm
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu multi-column columns-3">
              <div class="agile_inner_drop_nav_info">
                <div class="col-sm-4 multi-gd-img">
                  <ul class="multi-column-dropdown">
                    @foreach ($categoryLefts as $categoryLeft)
                    <li>
                      <a href="{{URL::to($categoryLeft->alias.'/'.$categoryLeft->id)}}">{{$categoryLeft->name}}</a>
                    </li>
                    @endforeach													
                  </ul>
                </div>
                <div class="col-sm-4 multi-gd-img">
                  <ul class="multi-column-dropdown">
                    @foreach ($categoryRights as $categoryRight)
                    <li>
                      <a href="{{URL::to($categoryRight->alias.'/'.$categoryRight->id)}}">{{$categoryRight->name}}</a>
                    </li>
                    @endforeach		
                  </ul>
                </div>
                <div class="col-sm-4 multi-gd-img">
                  <img src="{{asset('client/images/nav.png')}}" alt="">
                </div>
                <div class="clearfix"></div>
              </div>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Thương hiệu
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu multi-column columns-3">
              <div class="agile_inner_drop_nav_info">
                <div class="col-sm-6 multi-gd-img">
                  <ul class="multi-column-dropdown">
                    @foreach ($brands as $brand)
                    <li>
                      <a href="{{URL::to($brand->alias.'/'.$brand->id)}}">{{ $brand->name }}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>
                <div class="col-sm-4 multi-gd-img">
                  <img src="{{asset('client/images/nav.png')}}" alt="">
                </div>
                <div class="clearfix"></div>
              </div>
            </ul>
          </li>
          <li class="">
            <a class="nav-stylehead" href="faqs.html">
              Chính sách
            </a>
          </li>
          <li class="dropdown">
            <a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">
              Kết nối
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu agile_short_dropdown">
              <li>
                <a href="icons.html">
                  <i class="fab fa-facebook-square fa-lg" style="color: #0674E7"></i>
                  Facebook
                </a>
              </li>
              <li>
                <a href="typography.html">
                  <i class="fab fa-youtube fa-lg" style="color: #FF0000"></i>
                  Youtube
                </a>
              </li>
            </ul>
          </li>
          <li class="">
            <a class="nav-stylehead" href="contact.html">
              Liên hệ
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>