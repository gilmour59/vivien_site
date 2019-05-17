<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>World Escapes Travel & Tours</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!--
        CSS
        ============================================= -->
        <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">				
        <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">							
        <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">				
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>
    <body>

        <!-- Messenger -->
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                xfbml            : true,
                version          : 'v3.3'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <!-- Your customer chat code -->
        <div class="fb-customerchat"
        attribution=setup_tool
        page_id="1400216213452617"
        theme_color="#0084ff"
        logged_in_greeting="Hi! You can Inquire here :D"
        logged_out_greeting="Hi! You can Inquire here :D">
        </div>

        <header id="header">
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-6 col-6 header-top-left">		
                        </div>
                        <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                            <div class="header-social">
                                <a href="https://www.facebook.com/World-Escapes-Travel-and-Tours-1400216213452617/"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>			  					
                </div>
            </div>
            <div class="container main-menu">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="{{ route('welcome') }}"><span style="color:white">World Escapes Travel & Tours</span></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li><a href="{{ route('welcome') }}">Home</a></li>
                            <li class="menu-has-children"><a href="{{ route('packages.index') }}">Packages</a>
                                <ul>
                                    <li><a href="{{ route('packages.index') }}">All Packages</a></li>
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('packages.show', $category->id) }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{ route('about') }}">About</a></li>						          					          		          
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav><!-- #nav-menu-container -->					      		  
                </div>
            </div>
        </header><!-- #header -->

        <!-- Banner Area -->
        @yield('banner')

        <!-- Main Content Area -->
        @yield('content')

        <!-- start footer Area -->		
        <footer class="footer-area section-gap">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6  col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>About Agency</h6>
                            <p>
                                The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point 
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h6>Navigation Links</h6>
                            <div class="row">
                                <div class="col">
                                    <ul>
                                        <li><a href="{{ route('welcome') }}">Home</a></li>
                                        <li><a href="{{ route('packages.index') }}">Packages</a></li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul>
                                        <li><a href="{{ route('about') }}">About</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </div>										
                            </div>							
                        </div>
                    </div>							                    						
                </div>

                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-sm-12 footer-social">
                        <a href="https://www.facebook.com/World-Escapes-Travel-and-Tours-1400216213452617/"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer Area -->	

        <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>			
        <script src="{{ asset('js/jquery-ui.js') }}"></script>					
        <script src="{{ asset('js/easing.min.js') }}"></script>			
        <script src="{{ asset('js/hoverIntent.js') }}"></script>
        <script src="{{ asset('js/superfish.min.js') }}"></script>	
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>						
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>					
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>							
        <script src="{{ asset('js/mail-script.js') }}"></script>	
        <script src="{{ asset('js/main.js') }}"></script>
        @yield('js')	
    </body>
</html>