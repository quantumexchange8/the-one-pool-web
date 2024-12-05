<!--=====HEADER START=======-->
<header>
  <div class="header-area homepage1 header header-sticky d-none d-lg-block " id="header">
    <!-- Top Section -->
    <div class="header-top-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="header-social-area">
              <div class="social-area">
                <ul>
                  <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                  <li><a href="#" class="m-0"><i class="fa-brands fa-pinterest-p"></i></a></li>
                </ul>
              </div>

              <div class="top-author-area">
                <ul>
                  <li><a style="text-align: left;"><i class="fa-solid fa-location-dot"></i> NO 12 JALAN 2/24 TAMAN BUKIT RAWANG <br>JAYA 48000 RAWANG SELANGOR </a></li>
                  <li><a><img src="{{ asset('assets/img/icons/time.svg') }}" alt=""> Tuesday - Saturday <br>8:00 am - 5:00 pm </a></li>
                  <li><a class="m-0"><i class="fa-solid fa-phone"></i> Call Now: +60126370800 / +60162243443 </a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bottom Section -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-elements">
            <div class="site-logo">
              <a href="/"><img src="{{ asset('assets/img/logo/companylogo.png')}}" alt="Company Logo"></a>
            </div>
            <div class="main-menu">
              <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/aboutus">About Us</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/projects">Projects</a></li>
              </ul>
            </div>
            <div class="btn-area">
            <a href="{{ route('contactus') }}" class="header-btn1"> <img src="{{ asset('assets/img/icons/logo-icon1.svg') }}" alt=""> Contact Us </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<!--===== MOBILE HEADER STARTS =======-->
<div class="mobile-header mobile-haeder1 d-block d-lg-none">
  <div class="container-fluid">
    <div class="col-12">
      <div class="mobile-header-elements">
        <div class="mobile-logo">
          <a href="/"><img src="{{ asset('assets/img/logo/companylogo.png') }}" alt=""></a>
        </div>
        <div class="mobile-nav-icon dots-menu">
          <i class="fa-solid fa-bars"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="mobile-sidebar mobile-sidebar1">
  <div class="logosicon-area">
    <div class="logos">
      <img src="{{ asset('assets/img/logo/companylogo.png') }}" alt="">
    </div>
    <div class="menu-close">
      <i class="fa-solid fa-xmark"></i>
    </div>
  </div>
  <div class="mobile-nav mobile-nav1">
    <ul class="mobile-nav-list nav-list1">
      <li><a href="/" >Home </a></li>
      <li><a href="/aboutus">About Us</a></li>
      <li><a href="/services">Services</a></li>
      <li><a href="/projects">Projects</a></li>
      <li><a href="/contactus">Contact Us</a></li>
    </ul>
    <div class="allmobilesection">
      <a href="/contactus"  class="header-btn1"><img src="{{ asset('assets/img/icons/logo-icon1.svg') }}" alt=""> Get Started <span></span></a>
      <div class="single-footer">
        <h3>Contact Info</h3>
        <div class="footer1-contact-info">
          <div class="contact-info-single">
            <div class="contact-info-icon">
              <i class="fa-solid fa-phone-volume"></i>
            </div>
            <div class="contact-info-text">
              <a>+60126370800 / +60162243443</a>
            </div>
          </div>

          <!-- <div class="contact-info-single">
            <div class="contact-info-icon">
              <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="contact-info-text">
              <a href="mailto:info@example.com">theonepool.com</a>
            </div>
          </div> -->

          <div class="single-footer">
            <h3>Our Location</h3>
            
            <div class="contact-info-single">
              <div class="contact-info-icon">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="contact-info-text">
                <a>NO 12 JALAN 2/24 TAMAN BUKIT RAWANG JAYA 48000 RAWANG SELANGOR</a>
              </div>
            </div>

          </div>
          <div class="single-footer">
            <h3>Social Links</h3>
            
            <div class="social-links-mobile-menu">
              <ul>
                <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>