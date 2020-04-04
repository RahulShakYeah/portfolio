@include('frontend.header')
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- header-start -->
@include('frontend.navbar')
<!-- header-end -->

<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="shap_pattern d-none d-lg-block">
            <img src="images/about/grid.png" alt="">
        </div>
        <div class="social_links">
            <ul>
                @if(count($link) > 0)
                    @foreach($link as $key=>$value)
                        <li><a href="{{$value->link}}" target="_blank"> <i class="{{$value->class}}{{$value->name}}"></i> </a></li>
                    @endforeach
                @endif
            </ul>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <div class="slider_text text-center">
                        <h3>
                            Hello This is Rahul
                        </h3>
                        <span>Creative Designer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<!-- service_area  -->
<div class="service_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-65">
                    <span>Service Provided</span>
                    <h3>Build brands campaigns <br>
                        & digital projects</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-4">
                <div class="single_service text-center">
                    <div class="icon">
                        <img src="images/svg_icon/1.svg" alt="">
                    </div>
                    <h3>Graphic design</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_service text-center">
                    <div class="icon">
                        <img src="images/svg_icon/2.svg" alt="">
                    </div>
                    <h3>Web design</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_service text-center">
                    <div class="icon">
                        <img src="images/svg_icon/3.svg" alt="">
                    </div>
                    <h3>Mobile app</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ service_area  -->

<!-- portfolio_area -->
<div class="portfolio_area portfolio_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title white_text text-center">
                    <span>Portfolios</span>
                    <h3>Some of my awesome <br>
                        stuffs here</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ portfolio_area -->

<!-- portfolio_image_area  -->
<div class="portfolio_image_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-md-5">
                <div class="single_Portfolio">
                    <div class="portfolio_thumb">
                        <img src="images/portfolio/1.png" alt="">
                    </div>
                    <a href="images/portfolio/1.png" class="popup popup-image"></a>
                    <div class="portfolio_hover">
                        <div class="title">
                            <h3>Product Design</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-md-7">
                <div class="single_Portfolio">
                    <div class="portfolio_thumb">
                        <img src="images/portfolio/2.png" alt="">
                    </div>
                    <a href="images/portfolio/2.png" class="popup popup-image"></a>
                    <div class="portfolio_hover">
                        <div class="title">
                            <h3>Product Design</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-lg-4">
                <div class="single_Portfolio">
                    <div class="portfolio_thumb">
                        <img src="images/portfolio/3.png" alt="">
                    </div>
                    <a href="images/portfolio/3.png" class="popup popup-image"></a>
                    <div class="portfolio_hover">
                        <div class="title">
                            <h3>Product Design</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-lg-4">
                <div class="single_Portfolio">
                    <div class="portfolio_thumb">
                        <img src="images/portfolio/4.png" alt="">
                    </div>
                    <a href="images/portfolio/4.png" class="popup popup-image"></a>
                    <div class="portfolio_hover">
                        <div class="title">
                            <h3>Product Design</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12 col-lg-4">
                <div class="single_Portfolio">
                    <div class="portfolio_thumb">
                        <img src="images/portfolio/5.png" alt="">
                    </div>
                    <a href="images/portfolio/5.png" class="popup popup-image"></a>
                    <div class="portfolio_hover">
                        <div class="title">
                            <h3>Product Design</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="more_portfolio text-center">
                    <a class="line_btn" href="#">More Folio</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ portfolio_image_area  -->

<!-- about_me  -->
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
                        <a class="boxed-btn3" href="#">Download CV</a>
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
<!--/ about_me  -->

<div class="counter_area" style="margin-top:-120px;">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-4">
                <div class="single_counter text-center">
                    <h3>
                        <span class="counter">4 </span><span>+</span>
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
                                            <img src="{{asset('storage/testimonial/'.$value->image)}}"
                                                 style="max-width:50px;border-radius:50px;margin-left:-5px " alt="">
                                        </div>
                                        <h3>{{$value->name}}</h3>
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
@include('frontend.subscription')
<!-- footer start -->
@include('frontend.footer')
