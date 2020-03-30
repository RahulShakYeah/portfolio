<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Melan</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- header-start -->
<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-2">
                        <div class="logo">
                            <a href="index.html">
                                <img src="images/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a class="active" href="index.html">home</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">blog</a></li>
                                            <li><a href="single-blog.html">single-blog</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="portfolio.html">Portfolio</a></li>
                                            <li><a href="elements.html">elements</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                    @if (Route::has('login'))
                                            @auth
                                                <a href="{{ url('/home') }}">Dashboard</a>
                                            @else
                                                <a href="{{ route('login') }}">Login</a>

                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}">Register</a>
                                                @endif
                                            @endauth
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                        <div class="Appointment">
                            <div class="book_btn d-none d-lg-block">
                                <a  href="#">Contact Me</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
<!-- header-end -->

<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="shap_pattern d-none d-lg-block">
            <img src="images/about/grid.png" alt="">
        </div>
        <div class="social_links">
            <ul>
                <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
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
                    <h3>Build brands campaigns  <br>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida Risus com odo viverra maecenas.</p>
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
                        <img src="images/about/about.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ about_me  -->

<div class="counter_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-4">
                <div class="single_counter text-center">
                    <h3>
                        <span class="counter" >520 </span><span>+</span>
                    </h3>
                    <p>Total Projects</p>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_counter text-center">
                    <h3>
                        <span class="counter">244 </span>
                    </h3>
                    <p>On Going Projects</p>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="single_counter text-center">
                    <h3>
                        <span class="counter" >95 </span> <span>%</span>
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
                    <div class="single_carousel">
                        <div class="single_testmonial text-center">
                            <div class="quote">
                                <img src="img/testmonial/quote.svg" alt="">
                            </div>
                            <p>Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor <br>
                                sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec sed neque.  <br>
                                Fusce ac mattis nulla. Morbi eget ornare dui. </p>
                            <div class="testmonial_author">
                                <div class="thumb">
                                    <img src="images/testmonial/thumb.png" alt="">
                                </div>
                                <h3>Robert Thomson</h3>
                                <span>Business Owner</span>
                            </div>
                        </div>
                    </div>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>
                    <a class="boxed-btn3" href="#">Start Talking</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer start -->
<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="menu_links">
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Portfolio</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="socail_links">
                        <ul>
                            <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                            <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                            <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                            <li><a href="#"> <i class="fa fa-google-plus"></i> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ footer end  -->

<!-- JS here -->
<script src="{{asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
<script src="{{asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('js/ajax-form.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('js/scrollIt.js')}}"></script>
<script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/nice-select.min.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/gijgo.min.js')}}"></script>

<!--contact js-->
<script src="{{asset('js/contact.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>

<script src="{{asset('js/mains.js')}}"></script>
</body>

</html>
