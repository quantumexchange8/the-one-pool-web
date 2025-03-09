@extends('layouts.master')
@section('contents')

    <!--===== HERO AREA STARTS =======-->
    <div class="inner-header-section-area">
        <div class="elements2">
            <img src="assets/img/elements/elements2.png" alt="">
        </div>
        <div class="elements4">
            <img src="assets/img/elements/elements4.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 m-auto">
                    <div class="inner-page-header heading1 text-center">
                        <h1>Contacts Us</h1>
                        <a href="/">Home</a> <a><i class="fa-solid fa-angle-right"></i></a> <a><span>Contacts Us</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===== CONTACT AREA STARTS =======-->
    <div class="contact-box-section sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-boxarea">
                        <div class="img1">
                            <img src="assets/img/icons/location-icon2.svg" alt="">
                        </div>
                        <div class="space32"></div>
                        <h4>Our Address</h4>
                        <div class="space32"></div>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <div class="space32"></div>
                        <a href="https://www.google.com/maps/@3.3228865,101.5819207,19.33z?entry=ttu&g_ep=EgoyMDI1MDMwNC4wIKXMDSoASAFQAw%3D%3D" target="_blank" style="color: #5A5A5A;">
                            NO.31 & 31A JLN RAWANG PUTRA 6,<br/>
TAMAN BUKIT RAWANG PUTRA,<br/>
48000 RAWANG, SELANGOR D.E. 
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="contact-boxarea">
                        <div class="img1">
                            <img src="assets/img/icons/call-icon4.svg" alt="">
                        </div>
                        <div class="space32"></div>
                        <h4>Contact Us</h4>
                        <div class="space32"></div>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <div class="space32"></div>
                        <a> 
                            <a href="tel:+60126370800">+60126370800</a>
                            <br class="d-lg-block d-none"> 
                            <a href="tel:+60162243443">+60162243443</a>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="contact-boxarea">
                        <div class="img1">
                            <img src="assets/img/icons/email-icon2.svg" alt="">
                        </div>
                        <div class="space32"></div>
                        <h4>Email Us</h4>
                        <div class="space32"></div>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <div class="space32"></div>
                        <a href="mailto:enquiry@theonepool.com.my">enquiry@theonepool.com.my</a>
                        <div style="margin-bottom: 28px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mapouter">
    <div class="gmap_canvas">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.06600450548!2d101.58247451175521!3d3.3338703966269305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc426918579db5%3A0xc21c8ae32ad2a4a5!2s12%2C%20Jalan%202%2F24%2C%20Taman%20Bukit%20Rawang%20Jaya%2C%2048000%20Rawang%2C%20Selangor!5e0!3m2!1sen!2smy!4v1732500982331!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div> 

    <div id="contact-form"  class="contact-inner-box-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-boxarea heading2">
                        <h2 class="text-center">Send Us Message</h2>
                        <p class="text-center">Your email address will not be published.</p>
                        <div class="space28"></div>
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('contactus') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="input-area">
                                        <input id="fullname" name="fullname" type="text" autocomplete="off" placeholder="Full Name" required>
                                    </div>
                                    <div class="space20"></div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-area">
                                        <input id="phonenumber" name="phonenumber" type="number" placeholder="Phone Number" required>
                                    </div>
                                    <div class="space20"></div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-area">
                                        <input id="email" name="email" type="email" autocomplete="on" placeholder="Email Address" required>
                                    </div>
                                    <div class="space20"></div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="input-area">
                                        <input id="subject" name="subject" type="text" autocomplete="off" placeholder="Subjects">
                                    </div>
                                    <div class="space20"></div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="input-area">
                                        <textarea id="message" name="message" autocomplete="off" placeholder="Write Message" required></textarea>
                                    </div>
                                </div>
                                <div class="space20"></div>
                                <div class="col-lg-12">
                                    <div class="input-area">
                                        <button class="header-btn1" type="submit">
                                            <img src="assets/img/icons/logo-icon1.svg" alt=""> Submit Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space100 d-lg-block d-none"></div>
    <div class="space50 d-lg-none d-block"></div>
@endsection
