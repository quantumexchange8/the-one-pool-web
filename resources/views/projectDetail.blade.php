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
                <div class="col-lg-8 m-auto">
                    <div class="inner-page-header heading1 text-center">
                        <h1>{{ $project->title }}</h1>
                        <a href="/">Home <i class="fa-solid fa-angle-right"></i></a> <a href="/projects"> Projects <i class="fa-solid fa-angle-right"></i></a> <a><span> {{ $project->title }} </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===== PROJECT AREA STARTS =======-->
    <div class="projects-single-area sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto">
                    <div class="single-section-area heading2">
                        <h3>{{ $project->subtitle }}</h3>
                        <div class="space16"></div>
                        <p>{{ $project->description }}</p>
                        <div class="space42"></div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="project-list">
                                    <h4>Category </h4>
                                    <a href="#">{{ $project->category }}</a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-6">
                                <div class="project-list">
                                    <h4>Location</h4>
                                    <a href="#">{{ $project->location }}</a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-6">
                                <div class="project-list">
                                    <h4>Client</h4>
                                    <a href="#"> {{ $project->client }} </a>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-6 col-6">
                                <div class="project-list">
                                    <h4>Date </h4>
                                    <a href="#">{{ $project->date }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="space22"></div>
                        <div class="img1 image-anime project-image">
                            <img src="{{ asset('assets/img/projects/project' . $project->id . '/1.jpeg') }}" alt="">
                        </div>
                        <div class="space30"></div>
                        <div class="row">
                            @foreach ($project->images as $index => $image)
                                @if ($index > 0)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="img1 image-anime fixed-image">
                                            <img src="{{ asset($image->image_path) }}" alt="Project Image {{ $index + 1 }}">
                                        </div>
                                        <div class="space30 d-lg-none d-block"></div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div v class="space42"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection