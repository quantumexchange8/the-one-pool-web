@extends('layouts.master')
@section('contents')
<!--===== HERO AREA STARTS =======-->
<div class="inner-header-section-area">
  <div class="elements2">
    <img src="{{ asset('assets/img/elements/elements2.png') }}" alt="">
  </div>
  <div class="elements4">
    <img src="{{ asset('assets/img/elements/elements4.png') }}" alt="">
  </div>
  <div class="container">
    <div class="row">
        <div class="col-lg-4 m-auto">
            <div class="inner-page-header heading1 text-center">
                <h1>404 Error</h1>
                <a href="/">Home</a> <a><i class="fa-solid fa-angle-right"></i> <span>404 Error</span></a>
            </div>
        </div>
    </div>
  </div>
</div>

<!--===== ERROR AREA STARTS =======-->
<div class="error-section-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="error-images">
                    <img src="{{ asset('assets/img/404errors/1.png') }}" alt="" class="error">
                    <div class="space32"></div>
                    <div class="content-area heading2 text-center">
                        <h2>Sorry, Page Not Found!</h2>
                        <p>Sorry, the page you are looking for doesn’t exist or has
                        <br class="d-lg-block d-none"> been moved.</p>
                        <div class="space24"></div>
                        <a href="/" class="header-btn1"><img src="assets/img/icons/logo-icon1.svg" alt=""> Take Me Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection