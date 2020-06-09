@include('frontend.header')
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- header-start -->
@include('frontend.navbar')
<!-- header-end -->

<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center" style="margin-top: auto">
                    <h3>About Me</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /bradcam_area  -->
<!-- about_me  -->
<div id="about">
    <div class="about_me">
        <div class="about_large_title d-none d-lg-block">
            About
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="about_e_details">
                        <h3>About me</h3>
                        @if(count($about) > 0)
                            @foreach($about as $about)
                                <p>{{$about->description}}</p>
                            @endforeach
                        @endif
                        <div class="download_cv">
                            <a class="boxed-btn3" href="/download">Download CV</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="about_img">
                        <div class="color_pattern d-none d-lg-block">
                            <img src="images/about/color_grid.png" alt="">
                        </div>
                        <div class="my_Pic">
                            <img src="images/about.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ about_me  -->
<div class="container" style="margin-top: -20px">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <h2 style="font-weight: 700;font-size: 50px">Skills</h2>
            <div class="first-row row pt-3">
                <div class="col-lg-3 col-md-6 col-sm-3">
                    <div class="single-brand">
                        <img src="{{('images/skills/logo1.png')}}" alt="Brand-1 ">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-3">
                    <div class="single-brand">
                        <img src="{{('images/skills/logo2.png')}}" alt="Brand-2 ">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-3">
                    <div class="single-brand">
                        <img src="{{('images/skills/logo3.png')}}" alt="Brand-3 ">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-3">
                    <div class="single-brand">
                        <img src="{{('images/skills/logo4.png')}}" alt="Brand-4">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-3">
                    <div class="single-brand">
                        <img src="{{('images/skills/logo5.png')}}" alt="Brand-5 ">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-3">
                    <div class="single-brand">
                        <img src="{{('images/skills/logo6.png')}}" alt="Brand-6">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-3">
                    <div class="single-brand">
                        <img src="{{('images/skills/logo7.png')}}" alt="Brand-7 ">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-3">
                    <div class="single-brand">
                        <img src="{{('images/skills/logo8.png')}}" alt="Brand-8 ">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="counter_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-4">
                <div class="single_counter text-center">
                    <h3>
                        <span class="counter">{{\App\Portfolio::count()}} </span><span>+</span>
                    </h3>
                    <p>Total Projects</p>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_counter text-center">
                    <h3>
                        <span class="counter">5 </span>
                    </h3>
                    <p>On Going Projects</p>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_counter text-center">
                    <h3>
                        <span class="counter">35 </span> <span>%</span>
                    </h3>
                    <p>Job Success</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonial_area  -->
<div class="testimonial_area ">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    @if(count($testimonial) > 0)
                        @foreach($testimonial as $key=>$value)
                            <div class="single_carousel">
                                <div class="single_testmonial text-center">
                                    <div class="quote">
                                        <img src="images/testmonial/quote.svg" alt="">
                                    </div>
                                    <p>{{$value->description}} </p>
                                    <div class="testmonial_author">
                                        <div class="thumb">
                                            <img src="{{asset('uploads/testimonial/'.$value->image)}}"
                                                 style="max-width:50px;border-radius:50px;margin-left:-5px " alt="">
                                        </div>
                                        <a href="{{$value->url}}" target="_blank"><h3>{{$value->name}}</h3></a>
                                        <span>{{$value->position}}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /testimonial_area  -->

<div class="discuss_projects">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="project_text text-center">
                    <h3>Let’s discuss for a project</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor <br> incididunt ut
                        labore et dolore magna aliqua.</p>
                    <a class="boxed-btn3" href="#">Start Talking</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer start -->
@include('frontend.footer')
