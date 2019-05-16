@extends('layouts.post')

@section('banner')
    <section class="about-banner relative" style="background: url({{ asset('img/top-banner.jpg') }}) center;">
        <div class="overlay overlay-bg"></div>
        <div class="container">				
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        @if(isset($all))
                                {{ $all }}
                            </h1>
                            <p class="text-white link-nav"><a href="{{ route('welcome') }}">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="{{ route('packages.index') }}">All Packages </a></p>
                        @else
                                {{ $category->name }}
                            </h1>
                            <p class="text-white link-nav"><a href="{{ route('welcome') }}">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="{{ route('packages.index') }}">Packages </a> <span class="lnr lnr-arrow-right"></span> <a href="{{ route('packages.show', $category->id) }}">{{ $category->name }} </a></p>
                        @endif	 
                    <!-- </h1> -->                   	
                </div>	
            </div>
        </div>
    </section>
@endsection

@section('content')
    <!-- Start destinations Area -->
    @if (isset($category))
        <section class="destinations-area" style="padding-top: 80px">
            <div class="container">
                <div class="search row mb-5">
                    <div class="col-7 col-sm-5 col-md-4 col-lg-3 col-xl-3 offset-5 offset-sm-7 offset-md-8 offset-lg-9 offset-xl-9">
                        <form class="search-form" action="#">
                            <input placeholder="Search" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search'" >
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="menu-content pb-40 col-lg-8">
                        <div class="title text-center">
                            <h1 class="mb-10">{{ $category->name }}</h1>
                            <p>{{ $category->description }}</p>
                        </div>
                    </div>
                </div>						
                <div class="row">
                    @foreach ($posts as $post)
                        @if ($post->category->id === $category->id)
                            <div class="col-lg-4">
                                <div class="single-destinations">
                                    <div class="thumb">
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="">
                                    </div>
                                    <div class="details">
                                        <h4>{{ $post->title }}</h4>
                                        <p>{{ $post->description }}</p>
                                        <ul class="package-list">
                                            <li class="d-flex justify-content-between align-items-center">
                                                <span>Duration</span>
                                                <span>{{ $post->days }} days and {{ $post->nights }} nights</span>
                                            </li>
                                            <li class="d-flex justify-content-between align-items-center">
                                                <span>Flight</span>
                                                @if ($post->flight)
                                                    <span>Flight Included</span>
                                                @else
                                                    <span>Flight Not Included</span>
                                                @endif
                                            </li>
                                            <li class="d-flex justify-content-between align-items-center">
                                                <span>Price per person</span>
                                                <a href="{{ route('posts.show', $post->id) }}" class="price-btn">Php {{ $post->price }}</a>
                                            </li>													
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif                      
                    @endforeach																														
                </div>
            </div>	
        </section>
    @else
        @foreach ($categories as $key => $category)
            <section class="destinations-area" style="padding-top: 80px">
                <div class="container">
                    @if ($key === 0)
                        <div class="search row mb-5">
                            <div class="col-7 col-sm-5 col-md-4 col-lg-3 col-xl-3 offset-5 offset-sm-7 offset-md-8 offset-lg-9 offset-xl-9">
                                <form class="search-form" action="#">
                                    <input placeholder="Search" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search'" >
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    @endif
                    <div class="row d-flex justify-content-center">
                        <div class="menu-content pb-40 col-lg-8">
                            <div class="title text-center">
                                <h1 class="mb-10">{{ $category->name }}</h1>
                                <p>{{ $category->description }}</p>
                            </div>
                        </div>
                    </div>						
                    <div class="row">
                        @foreach ($posts as $post)
                            @if ($post->category->id === $category->id)
                                <div class="col-lg-4">
                                    <div class="single-destinations">
                                        <div class="thumb">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="">
                                        </div>
                                        <div class="details">
                                            <h4>{{ $post->title }}</h4>
                                            <p>{{ $post->description }}</p>
                                            <ul class="package-list">
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <span>Duration</span>
                                                    <span>{{ $post->days }} days and {{ $post->nights }} nights</span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <span>Flight</span>
                                                    @if ($post->flight)
                                                        <span>Flight Included</span>
                                                    @else
                                                        <span>Flight Not Included</span>
                                                    @endif
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <span>Price per person</span>
                                                    <a href="{{ route('posts.show', $post->id) }}" class="price-btn">Php {{ $post->price }}</a>
                                                </li>													
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif                      
                        @endforeach																														
                    </div>
                </div>	
            </section>
        @endforeach
    @endif
    <!-- End destinations Area -->

    <!-- Redirect to Packages Area -->
    <section class="home-about-area section-gap">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-6 col-md-12 home-about-left">
                    <h1>
                        Did not find your Package?
                    </h1>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the job is beyond reproach. inappropriate behavior is often laughed.
                    </p>
                </div>
                <div class="col-lg-6 col-md-12 home-about-left no-padding">
                    <a href="{{ route('packages.index') }}" class="primary-btn text-uppercase">All Packages</a>
                    @foreach ($categories as $category)
                        <a href="{{ route('packages.show', $category->id) }}" class="primary-btn text-uppercase">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>	
    </section>
    <!-- End home-about Area -->
@endsection