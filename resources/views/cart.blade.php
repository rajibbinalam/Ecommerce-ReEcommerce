@extends("layout")
@section("content")

    <div class="single-product">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Shoping Cart <span class="badge badge-primary badge-pill">{{$count}}</span></h1>
              
            </div>
          </div>
          <div class="col-md-12">
            <table class="table table-striped">
              <thead class="card-header">
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Image</th>
                  <th scope="col">Product</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                </tr>
              </thead>
              <tbody>
              @foreach($carts as $cart)
                <tr>
                  <th scope="row"><a href="{{url('/remove/'.$cart->rowId)}}"><i class="fa fa-times"></i></a></th>
                  <td>
                   <img src="" alt="">
                  </td>
                  <td>{{$cart->name}}</td>
                  <td>{{$cart->qty}}</td>
                  <td>BDT: {{$cart->price}} </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            <div class="row">
              <div class="col-md-6">
              </div>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    Check Out <span class="disabled" disabled="disabled">( Total Item - {{$count}} )</span>
                  </div>
                  <div class="card-body">
                    <h6 class="card-title">Total Amount <span style="margin-left: 241px;"> BDT: {{$subTotal}}</span></h6><hr>
                    <div class="input-group input-group-sm col-sm-3" style="flex-wrap: inherit;">
                      <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                      <div class="input-group-prepend" style="margin-right: -138px;">
                        <a href="" class="input-group-text" id="inputGroup-sizing-sm">Apply Coupon</a>
                      </div>
                    </div><br>
                    <h6 class="card-title">Delivery Charges <span style="margin-left: 241px;"> BDT: 50 </span></h6><hr><br>
                    <h5 class="card-title">Total Pay Amount <span style="margin-left: 172px;"> BDT: {{$subTotal}}</span></h5><br>
                    <a href="#" class="btn btn-outline-warning" style="margin-left: 398px;">Check Out</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection