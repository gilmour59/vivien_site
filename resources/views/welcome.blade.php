@extends('layouts.post')

@section('banner')
    <section class="about-banner relative" style="background: url({{ asset('img/top-banner.jpg') }}) center;">
        <div class="overlay overlay-bg"></div>
        <div class="container">				
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        World Escapes Travel & Tours				
                    </h1>	
                </div>	
            </div>
        </div>
    </section>
@endsection

@section('content')
    <!-- Start hot-deal Area -->
    <section class="hot-deal-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">This Week's Hot Deals</h1>
                    </div>
                </div>
            </div>						
            <div class="row justify-content-center">
                <div class="col-lg-10 active-hot-deal-carusel">
                    <!-- foreach -->
                    <div class="single-carusel">
                        <div class="thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="{{ asset('storage/posts/img/d1.jpg') }}" alt="">
                        </div>
                        <div class="price-detials">
                            <a href="#" class="price-btn">Starting From <span>$250</span></a>
                        </div>
                        <div class="details">
                            <h4 class="text-white">Ancient Architecture</h4>
                            <p class="text-white">
                                Cairo, Egypt
                            </p>
                        </div>								
                    </div>
                    <!-- foreach end-->														
                </div>
            </div>
        </div>	
    </section>
    <!-- End hot-deal Area -->

    <!-- Start destinations Area -->
    <section class="destinations-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-40 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Popular Destinations</h1>
                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, day to.</p>
                    </div>
                </div>
            </div>						
            <div class="row">
                <!-- foreach -->
                <div class="col-lg-4">
                    <div class="single-destinations">
                        <div class="thumb">
                            <img src="img/packages/d6.jpg" alt="">
                        </div>
                        <div class="details">
                            <h4>Holiday Sea beach Blue Ocean</h4>
                            <p>
                                United staes of America
                            </p>
                            <ul class="package-list">
                                <li class="d-flex justify-content-between align-items-center">
                                    <span>Duration</span>
                                    <span>06 days and 7 nights</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <span>Date</span>
                                    <span>18.04.2018</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <span>Airport</span>
                                    <span>Changi</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <span>Extras</span>
                                    <span>All Inclusive</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <span>Price per person</span>
                                    <a href="#" class="price-btn">$250</a>
                                </li>													
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- foreach end -->																														
            </div>
        </div>	
    </section>
    <!-- End destinations Area -->
@endsection