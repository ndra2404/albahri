@extends("templates")
@section("content")
<div class="innerHeading-wrap">
  <div class="container">
    <h1>Login</h1>
  </div>
</div>
<!-- Inner Heading End -->

<!-- Inner Content Start -->
<div class="innerContent-wrap">
@if (session('status'))
<div class="container">
    <div class="col-md-12">
      <div class="alert {{session('status')}}" role="alert">
        <p>{{ session('message') }}</p>
      </div>
    </div>
</div>
@endif
    <!-- Register Start -->
    <div class="login-wrap ">
      <div class="contact-info login_box">
        <div class="contact-form loginWrp registerWrp">
          <form id="contactForm" method="post" action="{{route('doLogin')}}">
            <div class="form_set">
              <h3>Login</h3>
              <div class="form-group">
                <input type="email" required name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="password" required name="password" class="form-control" placeholder="Confirm Password">
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <button type="submit" class="default-btn btn send_btn"> Login <span></span></button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Register End -->

  </div>
</div>
<!-- Inner Content Start -->
@endsection
