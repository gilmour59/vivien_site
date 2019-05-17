@extends('layouts.post')

@section('banner')
    <section class="relative about-banner">	
        <div class="overlay overlay-bg"></div>
        <div class="container">				
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
                   
            <!-- Go to www.addthis.com/dashboard to customize your tools -->
            <div class="addthis_inline_share_toolbox"></div>       

            <div class="search row mb-5">
                <div class="col-7 col-sm-5 col-md-4 col-lg-3 col-xl-3 offset-5 offset-sm-7 offset-md-8 offset-lg-9 offset-xl-9">
                    <form class="search-form" method="GET" action="{{ route('packages.index') }}">
                        <input placeholder="Search" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search'" value="{{ request()->query('search') }}">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="single-post">                
                    {{ $post->content }}
                </div>
            </div>
        </div>	
    </section>

    <section class="comments-area" style="margin-top: 0px; background: white;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div id="disqus_thread"></div>
                    <script>
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    
                        var disqus_config = function () {
                            this.page.url = '{{ config('app.url') }}posts/{{ $post->id }}';  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = '{{ $post->id }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };
                        
                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document, s = d.createElement('script');
                            s.src = 'https://world-escapes-travel-and-tours.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                </div>
            </div>            
        </div>	                                             				
    </section>
@endsection

@section('js')
    <!-- Go to www.addthis.com/dashboard to customize your tools --> 
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5cde2c26043b58ae"></script>
@endsection