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
                        <h1>Our Services</h1>
                        <a href="/">Home</a> <a><i class="fa-solid fa-angle-right"></i> <span> Services </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===== SERVICE AREA STARTS =======-->
    <div class="service-inner-section-area sp1">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="service-boxarea">
                        <div class="img1 image-anime" style="height: 380px">
                            <img src="{{ asset($service->images->first()->image_path) }}" alt="Sevice Cover Image">
                        </div>
                        <div class="content-area">
                            <div class="icons">
                                <img src="assets/img/icons/service-icon10.svg" alt="">
                            </div>
                            <a href="{{ route('service.details', ['id' => $service->id]) }}">{{ $service->name}}</a>
                            <div class="space16"></div>
                            <p>{{ Str::limit($service->description, 170, '...') }}</p>
                            <div class="space24"></div>
                            <a href="{{ route('service.details', ['id' => $service->id]) }}" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection