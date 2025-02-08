<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Lugx Gaming - Product Detail</title>

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/css/templatemo-lugx-gaming.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

	<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="assets/images/logo.png" alt="" style="width: 158px;">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="#">Games</a></li>
              <li><a href="{{ route('shop.index') }}" class="active">Blogs</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="#">Sign In</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>{{ $blog->title }}</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="single-product section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="left-image">
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <h1>{{ $blog->title }}</h1>

          <p>{!! $blog->content !!}</p>

        </div>
        <div class="col-lg-12">
          <div class="sep"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info">
    <div class="container">

    </div>
  </div>
  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2048 LUGX Gaming Company. All rights reserved. &nbsp;&nbsp; <a rel="nofollow" href="https://templatemo.com" target="_blank">Design: TemplateMo</a></p>
      </div>
    </div>
  </footer>

  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

	<script src="{{ asset('js/isotope.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
	<script src="{{ asset('assets/js/counter.js') }}"></script>
	<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>