<?php
  use App\Models\CategoryModel;
  $categorys = CategoryModel::where('id_parent', '=', 0)->get();

?>

<div class="container">
  <!-- footer first section -->
  <p class="footer-main">
    <span>"Shop phụ kiện"</span> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
    magni dolores eos qui ratione voluptatem sequi nesciunt.Sed ut perspiciatis unde omnis iste natus error sit voluptatem
    accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
    beatae vitae dicta sunt explicabo.</p>
  <!-- //footer first section -->
  <!-- footer second section -->
  <div class="w3l-grids-footer">
    <div class="col-xs-4 offer-footer">
      <div class="col-xs-4 icon-fot">
        <span class="fa fa-map-marker" aria-hidden="true"></span>
      </div>
      <div class="col-xs-8 text-form-footer">
        <h3>Track Your Order</h3>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="col-xs-4 offer-footer">
      <div class="col-xs-4 icon-fot">
        <span class="fa fa-refresh" aria-hidden="true"></span>
      </div>
      <div class="col-xs-8 text-form-footer">
        <h3>Free & Easy Returns</h3>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="col-xs-4 offer-footer">
      <div class="col-xs-4 icon-fot">
        <span class="fa fa-times" aria-hidden="true"></span>
      </div>
      <div class="col-xs-8 text-form-footer">
        <h3>Online cancellation </h3>
      </div>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
  <!-- //footer second section -->
  <!-- footer third section -->
  <div class="footer-info w3-agileits-info">
    <!-- footer categories -->
    <div class="col-sm-5 address-right">
      <div class="col-xs-12 footer-grids">
        <h3>Categorys</h3>
        <ul>
          @foreach ($categorys as $cate)
          <li>
            <a href="{{route('filterProducts', ["alias"=> $cate->alias, "id"=>$cate->id, "type"=>"c"])}}">{{ $cate->name }}</a>
          </li>              
          @endforeach
        </ul>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- //footer categories -->
    <!-- quick links -->
    <div class="col-sm-5 address-right">
      <div class="col-xs-6 footer-grids">
        <h3>Qiucks Link</h3>
        <ul>
          <li>
            <a href="#">About Us</a>
          </li>
          <li>
            <a href="#">Contact Us</a>
          </li>
          <li>
            <a href="#">Help</a>
          </li>
          <li>
            <a href="#">Faqs</a>
          </li>
          <li>
            <a href="#">Terms of use</a>
          </li>
          <li>
            <a href="#">Privacy Policy</a>
          </li>
        </ul>
      </div>
      <div class="col-xs-6 footer-grids">
        <h3>About US</h3>
        <ul>
          <li>
            <i class="fa fa-map-marker"></i> 165 Cau Giay, Ha Noi, Viet Nam.</li>
          <li>
            <i class="fa fa-mobile"></i> 333 222 3333 </li>
          <li>
            <i class="fa fa-phone"></i> +222 11 4444 </li>
          <li>
            <i class="fa fa-envelope-o"></i>
            <a href="mailto:example@mail.com">shopphukiensieure@gmail.com</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- //quick links -->
    <!-- social icons -->
    <div class="col-sm-2 footer-grids  w3l-socialmk">
      <h3>Follow US</h3>
      <div class="social">
        <ul>
          <li>
            <a class="icon fb" href="#">
              <i class="fa fa-facebook"></i>
            </a>
          </li>
          <li>
            <a class="icon tw" href="#">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li>
            <a class="icon gp" href="#">
              <i class="fa fa-google-plus"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="agileits_app-devices">
        <h5>Dowload the App</h5>
        <a href="#">
          <img src="{{asset('client/images/1.png')}}" alt="">
        </a>
        <a href="#">
          <img src="{{asset('client/images/2.png')}}" alt="">
        </a>
        <div class="clearfix"> </div>
      </div>
    </div>
    <!-- //social icons -->
    <div class="clearfix"></div>
  </div>
  <!-- //footer third section -->
    <!-- payment -->
    <div class="sub-some child-momu">
      <h5>Payment Method</h5>
      <ul>
        <li>
          <img src="{{asset('client/images/pay2.png')}}" alt="">
        </li>
        <li>
          <img src="{{asset('client/images/pay1.png')}}" alt="">
        </li>
        <li>
          <img src="{{asset('client/images/pay3.png')}}" alt="">
        </li>
      </ul>
    </div>
    <!-- //payment -->
  </div>
  <!-- //footer fourth section (text) -->
</div>