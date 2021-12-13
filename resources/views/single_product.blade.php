@extends("layout")
@section("content")
    <!-- Page Content -->
    <!-- Single Starts Here -->
    <div class="single-product">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
                @endif
              <div class="line-dec"></div>
              <h1>Your Product</h1>
            </div>
          </div>
          <div class="col-md-6">
            <div class="product-slider">
              <div id="slider" class="flexslider">
                <ul class="slides">
                  @if(isset($images[0]))
                  <li>
                    <img src="{{ asset($images[0])}}" style="height: 350px; width: 498px;"/>
                  </li>
                  @endif
                  @if(isset($images[1]))
                  <li>
                    <img src="{{ asset($images[1])}}" style="height: 350px; width: 498px;"/>
                  </li>
                  @endif
                  @if(isset($images[2]))
                  <li>
                    <img src="{{ asset($images[2])}}" style="height: 350px; width: 498px;"/>
                  </li>
                  @endif
                  @if(isset($images[3]))
                  <li>
                    <img src="{{ asset($images[3])}}" style="height: 350px; width: 498px;"/>
                  </li>
                  @endif
                  <!-- items mirrored twice, total of 12 -->
                </ul>
              </div>
              <div id="carousel" class="flexslider">
                <ul class="slides">
                @if(isset($images[0]))
                  <li>
                    <img src="{{ asset($images[0])}}" style="height: 100px; width: 100px;" />
                  </li>
                  @endif
                  @if(isset($images[1]))
                  <li>
                    <img src="{{ asset($images[1])}}" style="height: 100px; width: 100px;"/>
                  </li>
                  @endif
                  @if(isset($images[2]))
                  <li>
                    <img src="{{ asset($images[2])}}" style="height: 100px; width: 100px;"/>
                  </li>
                  @endif
                  @if(isset($images[3]))
                  <li>
                    <img src="{{ asset($images[3])}}" style="height: 100px; width: 100px;"/>
                  </li>
                  @endif
                  <!-- items mirrored twice, total of 12 -->
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-content">
              <h4>{{$products->name}}</h4>
              <h6>BDT: {{$products->price}}</h6>
              <p>{{$products->Details}} </p>
              <span>{{$products->quantity}} left on stock</span>

              <form action="/add-to-cart" method="post">
                @csrf
                <label for="quantity">Quantity:</label>
                <input name="quantity" type="number" class="quantity-text" id="quantity" value="1">
                <input name="pid" type="hidden" value="{{$products->id}}">
                <input name="name" type="hidden" value="{{$products->name}}">
                <input name="price" type="hidden" value="{{$products->price}}">
                <!-- <input name="images" type="hidden" value="{{$products->image}}"> -->
                <input type="submit" class="button" value="Order Now!">
              </form>

              <div class="down-content">
                <div class="categories">
                  <h6>Category: 
                    <span><a href="">{{$products->category->name}}</a></span>
                </h6>
                </div>
                <div class="share">
                  <h6>Share: <span><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-linkedin"></i></a><a href="#"><i class="fa fa-twitter"></i></a></span></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Single Page Ends Here -->


    <!-- Similar Starts Here -->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>You May Also Like</h1>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
            @foreach($releted_product as $rel_products)
              <a href="{{url('/single_product/'.$rel_products->id)}}">
                <div class="featured-item">
                  <img src="{{asset(explode('|',$rel_products->image)[0])}}" alt="{{$rel_products->name}}" style="height: 185px; width: 220px;">
                  <h4>{{$rel_products->name}}</h4>
                  <h6>BDT: {{$rel_products->price}}</h6>
                </div>
              </a>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Similar Ends Here -->
@endsection