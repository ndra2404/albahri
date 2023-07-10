<!doctype html>
<html lang="en">

<!-- Mirrored from entiretimes.com/html/school/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Jun 2023 03:52:27 GMT -->
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Fav Icon -->
<link rel="shortcut icon" href="favicon.ico">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{url('')}}/css/bootstrap.min.css">
<link href="{{url('')}}/css/all.css" rel="stylesheet">
<link href="{{url('')}}/css/owl.carousel.css" rel="stylesheet">

<!-- <link rel="stylesheet" href="css/switcher.css"> -->
<link rel="stylesheet" href="{{url('')}}/rs-plugin/css/settings.css">
<!-- Jquery Fancybox CSS -->
<link rel="stylesheet" type="text/css" href="{{url('')}}/css/jquery.fancybox.min.css" media="screen" />
<link href="{{url('')}}/css/animate.css" rel="stylesheet">
<link href="{{url('')}}/css/style.css" rel="stylesheet"  id="colors">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
<title>TK Al Bahri</title>
</head>
<body>

<!--Header Start-->
<div class="header-wrap">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-12 navbar-light">
        <div class="logo"> <a href="index.html"><img alt="" class="logo-default" src="{{url('')}}/images/logo.png"></a></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      </div>
      <div class="col-lg-6 col-md-12">
        @include("include.menu")
      </div>
      <div class="col-lg-3">
        <div class="header_info">
        @auth
          <div class="loginwrp"><a href="{{url('logout')}}">Logout</a></div>
        @endauth
        @guest
          <div class="loginwrp"><a href="{{url('login')}}">Login</a></div>
        @endguest
        </div>
      </div>
    </div>
  </div>
</div>
<!--Header End-->

@yield("content")

<!-- Teacher Start -->

<!-- Footer Start -->
<div class="footer-wrap">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
      <h3>Get in Touch</h3>
          <ul class="footer-adress">
            <li class="footer_address"> <i class="fas fa-map-signs"></i> <span>Jl. Mayor oking jayaatmaja ciriung RT 05/01 no 16, cibinong, bogor, 16918</span> </li>
            <li class="footer_email"> <i class="fas fa-envelope" aria-hidden="true"></i> <span><a href="mail:al.bahricibinong@gmail.com">al.bahricibinong@gmail.com</a></span> </li>
            <li class="footer_phone"> <i class="fas fa-phone-alt"></i> <span><a href="tel:081806107107"> 0818 0610 7107</a></span> </li>
          </ul>
      </div>
      <div class="col-lg-2 col-md-3">

      </div>
      <div class="col-lg-3 col-md-4">

      </div>
      <div class="col-lg-3 col-md-4">
        <div class="footer_info">

        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer End -->

<!--Copyright Start-->
<div class="footer-bottom text-center">
  <div class="container">
    <div class="copyright-text">Copyright © 2023. All Rights Reserved</div>
  </div>
</div>
<!--Copyright End-->

<!-- Js -->
<script src="{{url('')}}/js/jquery.min.js"></script>
<script src="{{url('')}}/js/bootstrap.min.js"></script>
<script src="{{url('')}}/js/popper.min.js"></script>
<script src="{{url('')}}/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="{{url('')}}/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<!-- Jquery Fancybox -->
<script src="{{url('')}}/js/jquery.fancybox.min.js"></script>
<!-- Animate js -->
<script src="{{url('')}}/js/animate.js"></script>
<script>
  new WOW().init();
</script>
<!-- WOW file -->
<script src="{{url('')}}/js/wow.js"></script>
<!-- general script file -->
<script src="{{url('')}}/js/owl.carousel.js"></script>
<script src="{{url('')}}/js/script.js"></script>
</body>

<!-- Mirrored from entiretimes.com/html/school/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Jun 2023 03:52:27 GMT -->
</html>
