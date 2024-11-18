<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>The One Pool</title>

     <!--=====FAB ICON=======-->
    <link rel="shortcut icon" href="assets/img/logo/fav-logo1.png" type="image/x-icon">

    <!--===== CSS LINK =======-->
    <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/aos.css">
    <link rel="stylesheet" href="assets/css/plugins/fontawesome.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/mobile.css">
    <link rel="stylesheet" href="assets/css/plugins/owlcarousel.min.css">
    <link rel="stylesheet" href="assets/css/plugins/sidebar.css">
    <link rel="stylesheet" href="assets/css/plugins/slick-slider.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <!--=====  JS SCRIPT LINK =======-->
    <script src="assets/js/plugins/jquery-3-6-0.min.js"></script>
</head>
<body class="homepage1-body">

<!--===== PROGRESS STARTS=======-->
<div class="paginacontainer">
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
  </div>
</div>
 <!--===== PROGRESS ENDS=======-->

  @include('layouts.topbar')

  @yield('contents')

  @include('layouts.footer')

<!--===== JS SCRIPT LINK =======-->
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/plugins/fontawesome.js"></script>
<script src="assets/js/plugins/aos.js"></script>
<script src="assets/js/plugins/counter.js"></script>
<script src="assets/js/plugins/sidebar.js"></script>
<script src="assets/js/plugins/magnific-popup.js"></script>
<script src="assets/js/plugins/mobilemenu.js"></script>
<script src="assets/js/plugins/owlcarousel.min.js"></script>
<script src="assets/js/plugins/nice-select.js"></script>
<script src="assets/js/plugins/waypoints.js"></script>
<script src="assets/js/plugins/gsap.min.js"></script>
<script src="assets/js/plugins/ScrollTrigger.min.js"></script>
<script src="assets/js/plugins/Splitetext.js"></script>
<script src="assets/js/plugins/slick-slider.js"></script>
<script src="assets/js/plugins/circle-progress.js"></script>
<script src="assets/js/plugins/ripples.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>