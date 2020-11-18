<div class="header-bot_inner_wthreeinfo_header_mid">
  <!-- header-bot-->
  <div class="col-md-4 logo_agile">
    <h1>
      <a href="index.html">
        <span>P</span>hụ kiện siêu rẻ
        <img src="{{asset('client/images/logo2.png')}}" alt=" ">
      </a>
    </h1>
  </div>
  <!-- header-bot -->
  <div class="col-md-8 header">
    <!-- header lists -->
    <ul>
      <li>
        <span class="fa fa-phone" aria-hidden="true"></span> 001 234 5678
      </li>
      <li>
        {{-- <a href="#" data-toggle="modal" data-target="#myModal1">
          <span class="fa fa-unlock-alt" aria-hidden="true"></span>Sign</a> --}}
          @if (Auth::check())
          <span>
            <span class="fa fa-user" aria-hidden="true"></span>
            {{ Auth::user()->name }}
          </span>
          @else
            <a href="{{ route('loginUser') }}">
              <span class="fa fa-unlock-alt" aria-hidden="true"></span>
              Sign
            </a>
          @endif
      </li>
      @if (Auth::check())
      <li>
          <a onclick="return confirm('Do you want to Signout ?')" href="{{ route('logoutUser') }}">
            <span class="fa fa-sign-out" aria-hidden="true"></span>
            Signout
          </a>
      </li>
      @endif
      <li>
        {{-- <a href="#" data-toggle="modal" data-target="#myModal2">
          <span class="fa fa-pencil-square-o" aria-hidden="true"></span>Signin</a> --}}
          <a href="{{ route('registerUser') }}">
            <span class="fa fa-unlock-alt" aria-hidden="true"></span>
            Register
          </a>
      </li>
      <li>
        <a href="#" class="w3view-cart btn btn-warning">
          <i class="fa fa-cart-arrow-down fa-2x" style="color: #ffffff"></i>
        </a>
      </li>
    </ul>
    <!-- //header lists -->
    <div class="clearfix"></div>
  </div>
  <div class="clearfix"></div>
</div>