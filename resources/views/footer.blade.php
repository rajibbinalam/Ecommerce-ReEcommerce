<!-- Subscribe -->
<div class="subscribe-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Subscribe NOW!</h1>
            </div>
          </div>
          <div class="col-md-8 offset-md-2">
            <div class="main-content">
              <p>To get Fasted and Letest information, Coupon Cerd, New Stylist Products, Gedged and many more.</p>
              <div class="container">

                <form id="subscribe" action="/subscriber" method="get">
                  @csrf
                  <div class="row">
                    <div class="col-md-7">
                      <fieldset>
                        <input name="email" type="text" class="form-control" id="email" 
                        onfocus="if(this.value == 'Your Email...') { this.value = ''; }" 
                    	onBlur="if(this.value == '') { this.value = 'Your Email...';}"
                    	value="Your Email..." required>
                      </fieldset>
                    </div>
                    <div class="col-md-5">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">Subscribe Now!</button>
                      </fieldset>
                    </div>
                  </div>
                </form><br>
                @if(session()->has('subscribe'))
                  <div class="alert alert-success">
                      {{session()->get('subscribe')}}
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Subscribe -->


<div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="logo">
            <a class="navbar-brand" href="{{url('/')}}" style="color: revert;">
              <i class="fa fa-reorder" style="font-size: 17px; margin: 58px 0 46px 0;"></i>commerce
                <!-- <img src="assets/images/header-logo.png" alt=""> -->
            </a>
            </div>
          </div>
          <div class="col-md-12">
            <div class="footer-menu">
              <ul>
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('')}}">Help</a></li>
                <li><a href="{{url('')}}">Privacy Policy</a></li>
                <li><a href="{{url('')}}">How It Works ?</a></li>
                <li><a href="{{url('/contact')}}">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="social-icons">
              <ul>
                <li><a href="https://www.facebook.com/imrba"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://www.linkedin.com/in/rajibbinalam"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="https://github.com/rajibbinalam"><i class="fa fa-github"></i></a></li>
                <li><a href="https://stackoverflow.com/users/11970472/rajib-bin-alam"><i class="fa fa-stack-overflow"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Ends Here -->

    <!-- Sub Footer Starts Here -->
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
              <p>Copyright &copy; <?= date("Y")?> Ecommerce 
                
                - Develop: <a href="https://github.com/rajibbinalam">RAJIB</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>