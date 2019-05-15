@extends('layouts.post')

@section('banner')
    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">				
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Contact Us				
                    </h1>	
                    <p class="text-white link-nav"><a href="{{ route('welcome') }}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ route('contact') }}"> Contact Us</a></p>
                </div>	
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="about-info-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 info-left">
                    <img class="img-fluid" src="{{ asset('img/about.jpg') }}" alt="">
                </div>
                <div class="col-lg-6 info-right">
                    <h1>Who We Are?</h1>
                    <p>
                        We are a group of people who are well-versed in the fun and rigors of traveling. Our travel agency came together to help other people plan and book their dream vacations from their hard earned jobs and travel savings. Our vision is to make your dream travel destination come true! We in World Escapes brings your closer to the world!
                    </p>
                </div>
            </div>
        </div>	
    </section>
    
    <section class="about-info-area section-gap" style="background-color: #f9f9ff">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 info-right">
                    <h1>Our Services</h1>
                    <p>
                        Whether you're looking for a hotel, plane tickets, resort accommodations, or the whole package, we have you covered! Just lets us know where you want to go and we'll help you figure out the rest. We work directly with other companies to get the best deals. Check our latest offers!
                    </p>
                </div>
                <div class="col-lg-6 info-left">
                    <img class="img-fluid" src="{{ asset('img/services.jpg') }}" alt="">
                </div>
            </div>
        </div>	
    </section>

    <section class="about-info-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 info-left">
                    <img class="img-fluid" src="{{ asset('img/satisfaction.jpg') }}" alt="">
                </div>
                <div class="col-lg-6 info-right">
                    <h1>Satisfaction Guaranteed</h1>
                    <p>
                        While working with us, we want you to be completely happy with the experience. If you have questions about us, our services, or even travel tips, get in touch! We hope you continue to book with us every time you think of traveling.
                    </p>
                </div>
            </div>
        </div>	
    </section>

    <section class="other-issue-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-9">
                    <div class="title text-center">
                        <h1 class="mb-10">Meet the Team</h1>
                    </div>
                </div>
            </div>					
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single-other-issue">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('img/satisfaction.jpg') }}" alt="">					
                        </div>
                        <h4>Vivien - Managing Director</h4>
                        <p>
                            I am very passionate about people achieving their dream travel destinations. When I started this company our vision is to provide travel solutions to everyone regardless of their budget. It is our goal to give you the best possible deals and make your dreams come true. World Escapes - brings you closer to the world!
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-other-issue">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('img/satisfaction.jpg') }}" alt="">					
                        </div>
                        <h4>Vennie - Travel Consultant</h4>
                        <p>
                            Traveling is an experience which we cannot exchange for any material things. Our goal in World Escapes is to ensure our customers would have an extremely remarkable memories which they can take home and talk to their families and friends. We aim to delight and multiply those travel experience all together.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-other-issue">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('img/satisfaction.jpg') }}" alt="">					
                        </div>
                        <h4>John - Travel Consultant</h4>
                        <p>
                            World Escapes caters to all Filipino travelers, young or old, teachers, doctors, nurses, lawyers, employees, NGOs, students, and anyone who would like to go from one place to another. It could be your future holiday plans, or just your short staycation - we are here to provide you with the best possible offers on flights, hotels, tour packages, visa assistance and more!
                        </p>
                    </div>
                </div>																		
            </div>
        </div>	
    </section>
@endsection