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
    <!-- Start contact-page Area -->
    <section class="contact-page-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 d-flex flex-column address-wrap">
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-home"></span>
                        </div>
                        <div class="contact-details">
                            <h5>Capiz, Philippines</h5>
                            <p>
                                Capricho I Street, Roxas City
                            </p>
                        </div>
                    </div>
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-phone-handset"></span>
                        </div>
                        <div class="contact-details">
                            <h5>+63 999 995 1723 / 24</h5>
                            <p>Call or Text!</p>
                        </div>
                    </div>
                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-envelope"></span>
                        </div>
                        <div class="contact-details">
                            <h5>vivien.c.cuadra@gmail.com</h5>
                            <p>Send us your inquiry anytime!</p>
                        </div>
                    </div>														
                </div>
                <div class="col-lg-8">
                    <form class="form-area contact-form text-right" id="contactForm" action="{{ route('contact.email') }}" method="post">
                        @csrf
                        <div class="row">	
                            <div class="col-lg-6 form-group">
                                <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
                            
                                <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

                                <input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text">
                            </div>
                            <div class="col-lg-6 form-group">
                                <textarea class="common-textarea form-control" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" required=""></textarea>				
                            </div>
                            <div class="col-lg-12">
                                <div class="alert-msg" style="text-align: left;"></div>
                                <button type="submit" form="contactForm" class="genric-btn primary" style="float: right;">Send Message</button>											
                            </div>
                        </div>
                    </form>	
                </div>
            </div>
        </div>	
    </section>
    <!-- End contact-page Area -->
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if(session()->has('success'))
            toastr.success("{{ Session::get('success') }}");
        @elseif(session()->has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@endsection