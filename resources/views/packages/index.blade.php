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
        <section class="destinations-area" style="padding-top: 80px; padding-bottom: 40px">
            <div class="container">
                <div class="search row mb-5">
                    <div class="col-7 col-sm-5 col-md-4 col-lg-3 col-xl-3 offset-5 offset-sm-7 offset-md-8 offset-lg-9 offset-xl-9">
                        <form class="search-form" method="GET" action="{{ route('packages.show', $category->id) }}">
                            <input placeholder="Search" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search'" value="{{ request()->query('search') }}">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>						
                <div class="row">
                    @if ($posts->count() === 0)
                        @if (request()->query('search'))
                            <span>No Results found for <strong> {{ request()->query('search') }}</strong> in {{ $category->name }}</span>
                        @else
                            <span>No posts yet! Sorry.</span>
                        @endif                                
                    @else
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
                    @endif																														
                </div>
                {{ $posts->appends(['search' => request()->query('search')])->links() }}
            </div>	
        </section>
    @else        
        <!-- !array_key_exists($category->id, array_count_values($posts->pluck('category_id')->toArray())) -->
        <section class="destinations-area" style="padding-top: 80px; padding-bottom: 40px">
            <div class="container">
                <div class="search row mb-5">
                    <div class="col-7 col-sm-5 col-md-4 col-lg-3 col-xl-3 offset-5 offset-sm-7 offset-md-8 offset-lg-9 offset-xl-9">
                        <form class="search-form" method="GET" action="{{ route('packages.index') }}">
                            <input placeholder="Search" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search'" value="{{ request()->query('search') }}">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>					
                <div class="row">
                    @if ($posts->count() === 0)
                        @if (request()->query('search'))
                            <span>No Results found for <strong> {{ request()->query('search') }}</strong></span>
                        @else
                            <span>No posts yet! Sorry.</span>
                        @endif                                
                    @else
                        @foreach ($posts as $post)
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
                        @endforeach
                    @endif																														
                </div>
                {{ $posts->appends(['search' => request()->query('search')])->links() }}
            </div>	
        </section>
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
                        Choose the Package that fits your needs:
                    </p>
                </div>
                <div class="col-lg-6 col-md-12 home-about-left no-padding">
                    @if(!isset($all))
                        <a href="{{ route('packages.index') }}" class="primary-btn text-uppercase">All Packages</a>
                    @endif                        
                    @foreach ($categories as $category_link)
                        @if(isset($category) && (!($category->id === $category_link->id)))
                            <a href="{{ route('packages.show', $category_link->id) }}" class="primary-btn text-uppercase">{{ $category_link->name }}</a>
                        @elseif(isset($all))
                            <a href="{{ route('packages.show', $category_link->id) }}" class="primary-btn text-uppercase">{{ $category_link->name }}</a>
                        @endif                        
                    @endforeach
                </div>
            </div>
        </div>	
    </section>
    <!-- End home-about Area -->
@endsection