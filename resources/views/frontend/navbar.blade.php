<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-2">
                        <div class="logo">
                            <a href="{{route('all')}}">
                                <img src="{{asset('images/logo.png')}}" style="margin-left: 25px;margin-top:-10px;width:80px;" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="main-menu  d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a class="active" href="{{route('all')}}">home</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="services.html">Services</a></li>
                                    @auth
                                    <li><a href="services.html">Videos</a></li>
                                    @endauth
                                    <li><a href="{{route('get.blog')}}">Blog</a></li>
                                    <li>
                                        @if (Route::has('login'))
                                            @auth
                                                <a href="{{ url('/home') }}" target="_blank">Dashboard</a>
                                            @else
                                                <a href="{{ route('login') }}" target="_blank">Login</a>
                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" target="_blank">Register</a>
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
                                <a href="{{route('contact.view')}}">Contact Me</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                    @if(session('error'))
                    <div class="alert alert-warning alert-dismissible fade show offset-9 mt-3" role="alert">
                        {{session('error')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</header>