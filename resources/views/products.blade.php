 @extends("layout")
 @section("content")
 <!-- Page Content -->
    <!-- Items Starts Here -->
    <div class="featured-page">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Featured Items</h1>
            </div>
          </div>
          <div class="col-md-8 col-sm-12">
            <div id="filters" class="button-group">
              <button class="btn btn-primary" data-filter="*">All Products</button>
              <button class="btn btn-primary" data-filter=".new">Newest</button>
              <button class="btn btn-primary" data-filter=".low">Low Price</button>
              <button class="btn btn-primary" data-filter=".high">Hight Price</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="featured container no-gutter">

        <div class="row posts">
        @foreach($products as $product)
            <div id="1" class="item new col-md-4">
              <a href="{{url('/single_product/'.$product->id)}}">
                <div class="featured-item">
                  <img src="{{asset(explode('|',$product->image)[0])}}" alt="{{$product->name}}" style="height: 223px; width: 306px;">
                  <h4>{{$product->name}}</h4>
                  <h6>BDT: {{$product->price}}</h6>
                </div>
              </a>
            </div>
            @endforeach
        </div>
    </div>

    <div class="page-navigation">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul>
              <li>{{$products->links()}}</li>
            </ul>
            
            <!-- <ul>
              <li class="current-page"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
            </ul> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Featred Page Ends Here -->
@endsection