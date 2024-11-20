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
                <div class="col-lg-8 m-auto">
                    <div class="inner-page-header heading1 text-center">
                        <h1> {{$service->name}}</h1>
                        <a href="/">Home <i class="fa-solid fa-angle-right"></i></a> <a href="/services">Our Services <i class="fa-solid fa-angle-right"></i></a> <a><span> {{ $service->name}} </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===== SERVICE AREA STARTS =======-->
    <div class="service-single-area sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="single-section-area heading2">
                        <div class="img1 image-anime reveal service-image">
                            <img src="{{ asset('assets/img/services/service' . $service->id . '/1.jpeg') }}" alt="">
                        </div>
                        <div class="space42"></div>
                        <h3>{{ $service->subtitle}}</h3>
                        <div class="space16"></div>
                        <p>{{ $service->description}}</p>
                        <div class="space42"></div>

                        @foreach($service->details as $title => $points)
                            <div class="icons-list">
                                <div class="icons">
                                    <img src="{{ asset('assets/img/icons/check-icon2.svg') }}" alt="">
                                </div>
                                <div class="text">
                                    <h3>{{ $title }}</h3>
                                    <ul>
                                        @foreach($points as $point)
                                            <li>{{ $point }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="space20"></div>
                        @endforeach



                        <div class="space42"></div>
                        <div class="icons-list1">
                            <div class="icons1">
                                <img src="{{ asset('assets/img/icons/check-icon2.svg') }}" alt="">
                            </div>
                            <div class="text">
                                <h3>Crafting Aquatic Masterpieces</h3>
                                <p>Our team is dedicated to delivering excellence in pool construction, combining technical expertise with a passion for creating stunning aquatic spaces. Whether you're building a new pool, upgrading existing features, or undertaking a large-scale commercial project, we are committed to turning your vision into reality with quality and precision.</p>
                            </div>
                        </div>
                        <div class="space40"></div>
                        <div class="service-others-area">
                        <div class="row">
                            @foreach ($service->images as $index => $image)
                                @if ($index > 0)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="img1 image-anime fixed-image">
                                            <img src="{{ asset($image->image_path) }}" alt="Service Image {{ $index + 1 }}">
                                        </div>
                                        <div class="space30 d-lg-none d-block"></div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection