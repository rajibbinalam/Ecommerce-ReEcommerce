
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}" style="color: revert;">
         <!-- <i class="fa fa-reorder" style="font-size: 17px;"></i>commerce -->
          <img src="{{asset('logo.png')}}" alt="Ecommerce" style="height: 31px;  width: 68px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
              <a class="nav-link" href="{{url('/')}}">Home
                <!-- <span class="sr-only">(current)</span> -->
              </a>
            </li>
            <li class="nav-item {{ (request()->is('/products')) ? 'active' : '' }}">
              <a class="nav-link" href="{{url('/products')}}">Products</a>
            </li>
            <li class="nav-item {{ (request()->is('/about')) ? 'active' : '' }}">
              <a class="nav-link" href="{{url('/about')}}">About Us</a>
            </li>
            <li class="nav-item {{ (request()->is('/contact')) ? 'active' : '' }}">
              <a class="nav-link" href="{{url('/contact')}}">Contact Us</a>
            </li>
            <li class="nav-item {{ (request()->is('/cart')) ? 'active' : '' }}">
              <a class="nav-link" href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i> Cart<span class="badge badge-primary badge-pill" style="padding: 2px 3px 2px 3px; background-color: #ff5e00; position: absolute;">{{Cart::count()}}</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    