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
                <div class="col-lg-10 m-auto">
                    <div class="inner-page-header heading1 text-center">
                        <h1>Our Past Projects</h1>
                        <a href="/">Home</a> <a><i class="fa-solid fa-angle-right"></i> <span> Projects </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===== PROJECT AREA STARTS =======-->
    <div class="blog-single-area sp1">
        <div class="container">
            <div class="row">
                
                <!-- Projects -->
                <div class="col-lg-8">
                    <div class="blog1-section-area">
                        <div class="container">
                            <div class="row">
                                @foreach ($projects as $project)
                                <div class="col-lg-12 col-md-12">
                                    <div class="blog-boxarea">
                                        <div class="img1 image-anime project-list-image">
                                            <img src="{{ asset($project->images->first()->image_path) }}" alt="Project Cover Image">
                                        </div>
                                        <div class="content-area">
                                            <ul class="">
                                                <li><a href="#" class="date" style="padding: 0;"><i class="fa-solid fa-location"></i> {{ $project->location }} </a></li>
                                                <li><a href="#" class="date"><i class="fa-regular fa-calendar"></i> {{ $project->date }} </a></li>
                                            </ul>
                                            <div class="space16"></div>
                                            <a href="{{ route('project.details', ['id' => $project->id]) }}">{{ $project->category }}: {{ $project->client}}</a>
                                            <div class="space16"></div>
                                            <p>{{ Str::limit($project->description, 150, '...') }}</p>
                                            <div class="space24"></div>
                                            <a href="{{ route('project.details', ['id' => $project->id]) }}" class="header-btn1">Read More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                        <div class="arrow-area">
                                            <a href="{{ route('project.details', ['id' => $project->id]) }}"><i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>  
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="service-single-author">
                        <div class="serach-area">
                            <h3>Search</h3>
                            <div class="space24"></div>
                            <form method="GET" action="{{ route('projects') }}">
                                <input 
                                    id="search" 
                                    name="search" 
                                    type="text" 
                                    value="{{ request('search') }}" 
                                    placeholder="Search..." 
                                />
                                <button type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>
                        </div>

                        <div class="space40"></div>

                        <h3>Categories</h3>
                        <div class="space12"></div>
                        <div class="projects-tags">
                            <ul>
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('projects', ['category' => $category]) }}">
                                            {{ $category }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="space40"></div>
                        <h3>Our Projects</h3>
                        <div class="space4"></div>
                        <div class="service-list">
                            <ul>
                                @foreach($sideprojects as $project)
                                    <li><a href="{{ route('project.details', ['id' => $project->id]) }}"><span>{{ $project->category }}: {{ $project->client}}</span> <span><i class="fa-solid fa-arrow-right"></i></span></a></li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection