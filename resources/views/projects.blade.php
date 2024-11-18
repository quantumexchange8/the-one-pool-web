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
                        <a href="/">Home <i class="fa-solid fa-angle-right"></i></a><a><span> Projects </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===== PROJECT AREA STARTS =======-->
    <div class="blog-single-area sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog1-section-area">
                        <div class="container">
                            <div class="row">
                                
                                <div class="col-lg-12 col-md-12">
                                    <div class="blog-boxarea">
                                        <div class="img1 image-anime" style="height: 480px">
                                            <img src="assets/img/projects/project1/cover.jpeg" alt="">
                                        </div>
                                        <div class="content-area">
                                        <ul>
                                            <li><a href="#" class="date" style="padding: 0;"><i class="fa-solid fa-location"></i> Shah Alam Expressway </a></li>
                                            <li><a href="#" class="date"><i class="fa-regular fa-calendar"></i> 1 Jun 2024 </a></li>
                                        </ul>
                                        <div class="space16"></div>
                                        <a href="/projectdetail">Pool Construction</a>
                                        <div class="space16"></div>
                                        <p>Designed and built a stunning, durable swimming pool tailored to the client’s vision. The project included premium materials, advanced features, and meticulous craftsmanship, completed on time and within budget.</p>
                                        <div class="space24"></div>
                                        <a href="/projectdetail" class="header-btn1">Read More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                        <div class="arrow-area">
                                        <a href="/projectdetail"><i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="col-lg-12 col-md-12">
                                    <div class="blog-boxarea">
                                        <div class="img1 image-anime" style="height: 480px">
                                            <img src="assets/img/projects/project2/cover.jpeg" alt="">
                                        </div>
                                        <div class="content-area">
                                        <ul>
                                            <li><a href="#" class="date" style="padding: 0;"><i class="fa-solid fa-location"></i> Seksyen 32, Shah Alam </a></li>
                                            <li><a href="#" class="date"><i class="fa-regular fa-calendar"></i> 25 September 2023 </a></li>
                                        </ul>
                                        <div class="space16"></div>
                                        <a href="/projectdetail">Landscaping and Features</a>
                                        <div class="space16"></div>
                                        <p>Enhanced the pool area with bespoke landscaping and features, including decking, water features, lighting, greenery, creating a cohesive and inviting outdoor space.</p>
                                        <div class="space24"></div>
                                        <a href="/projectdetail" class="header-btn1">Read More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                        <div class="arrow-area">
                                        <a href="/projectdetail"><i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="col-lg-12 col-md-12">
                                    <div class="blog-boxarea">
                                        <div class="img1 image-anime" style="height: 480px">
                                            <img src="assets/img/projects/project3/cover.jpeg" alt="">
                                        </div>
                                        <div class="content-area">
                                        <ul>
                                            <li><a href="#" class="date" style="padding: 0;"><i class="fa-solid fa-location"></i> Petaling Jaya, Selangor </a></li>
                                            <li><a href="#" class="date"><i class="fa-regular fa-calendar"></i> 15 Nov 2024 </a></li>
                                        </ul>
                                        <div class="space16"></div>
                                        <a href="/projectdetail">Renovation and Upgrades</a>
                                        <div class="space16"></div>
                                        <p>Revitalized an aging pool with modern enhancements, including updated tiling, advanced filtration systems, and LED lighting. The upgrades improved functionality, durability, and aesthetics, transforming the pool into a stunning, contemporary space for relaxation and enjoyment.</p>
                                        <div class="space24"></div>
                                        <a href="/projectdetail" class="header-btn1">Read More <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                        <div class="arrow-area">
                                        <a href="/projectdetail"><i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="space50 d-lg-none d-block"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="service-single-author">
                        <div class="serach-area">
                            <h3>Search</h3>
                            <div class="space24"></div>
                            <form>
                                <input id="search" type="text" placeholder="Search..">
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="space40"></div>

                        <h3>Popular Tags</h3>
                        <div class="space12"></div>
                        <div class="projects-tags">
                            <ul>
                                <li><a href="#">Pool Cleaning</a></li>
                                <li><a href="#">Pool Automation</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Green Pool Cleanup</a></li>
                                <li><a href="#">Pool Safety</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Pool Upgrades</a></li>
                                <li><a href="#">Pool Service</a></li>
                            </ul>
                        </div>

                        <div class="space40"></div>
                        <h3>Our Projects</h3>
                        <div class="space4"></div>
                        <div class="service-list">
                            <ul>
                                <li><a href="#"><span>Pool Construction: Shah Alam Expressway</span> <span><i class="fa-solid fa-arrow-right"></i></span></a></li>
                                <li><a href="#"><span>Landscaping and Features: Seksyen 32, Shah Alam</span> <span><i class="fa-solid fa-arrow-right"></i></span></a></li>
                                <li><a href="#"><span>Renovation and Upgrades: Petaling Jaya, Selangor</span> <span><i class="fa-solid fa-arrow-right"></i></span></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection