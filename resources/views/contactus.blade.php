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
                        <a href="/">Home <i class="fa-solid fa-angle-right"></i></a> <a><span>Contacts Us</span></a>
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
                        <a href="#">No 12 Jalan 2/24 Taman Bukit Rawang Jaya 48000 Rawang Selangor, Malaysia</a>
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
                    <a href="tel:+022(123)4568806">+60126370800 /
                        <br class="d-lg-block d-none"> +60162243443</a>
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
                    <a href="mailto:drmtech99.com">theonepool@gmail.com
                    <br class="d-lg-block d-none"> theonepool.com</a>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="mapouter">
    <div class="gmap_canvas">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4506257.120552435!2d88.67021924228865!3d21.954385721237916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1704088968016!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div> 

    <div class="contact-inner-box-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-boxarea heading2">
                        <h2 class="text-center">Send Us Message</h2>
                        <p class="text-center">Your email address will not be published.</p>
                        <div class="space28"></div>
                        <form action="{{ route('contactus') }}" method="POST">
                                @csrf <!-- Protects against cross-site request forgery -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-area">
                                            <input id="fullname" name="fullname" type="text" placeholder="Full Name" required>
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
                                            <input id="email" name="email" type="email" placeholder="Email Address" required>
                                        </div>
                                        <div class="space20"></div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="input-area">
                                            <input id="subject" name="subject" type="text" placeholder="Subjects">
                                        </div>
                                        <div class="space20"></div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-area">
                                            <textarea id="message" name="message" placeholder="Write Message" required></textarea>
                                        </div>
                                    </div>
                                    
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