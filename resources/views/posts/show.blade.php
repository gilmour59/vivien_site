@extends('layouts.post')

@section('banner')
    <section class="relative about-banner">	
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="search row mb-5">
                <div class="col-7 col-sm-5 col-md-4 col-lg-3 col-xl-3 offset-5 offset-sm-7 offset-md-8 offset-lg-9 offset-xl-9">
                    <form class="search-form" action="#">
                        <input placeholder="Search" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search'" >
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>				
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        {{ $post->title }}				
                    </h1>	
                    <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span><a href="blog-home.html">{{ $post->category->type }} Packages </a> <span class="lnr lnr-arrow-right"></span> <a href="blog-single.html"> {{ $post->title }}</a></p>
                </div>	
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="post-content-area single-post-area">
        <div class="container">
            <div class="single-post">                
                {{ $post->content }}
            </div>
        </div>	
    </section>
@endsection