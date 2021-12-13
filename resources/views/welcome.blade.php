@extends("layout")

@section("content")
    
    <!-- Page Content -->
    <!-- Banner  -->
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="caption">
              <h2>Happy Shop</h2>
              <div class="line-dec"></div>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary</p>
              <div class="main-button">
                <a href="{{url('/products')}}">See Products!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Featurd item-->
    <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Featured Items</h1>
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
            @foreach($products as $product)
              <a href="{{url('/single_product/'.$product->id)}}">
                <div class="featured-item">
                  <img src="{{asset(explode('|',$product->image)[0])}}" alt="{{$product->name}}" style="height: 210px; width: 100%;">
                  <h4>{{$product->name}}</h4>
                  <h6>BDT: {{$product->price}}</h6>
                </div>
              </a>
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>


    

    @endsection