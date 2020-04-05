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
                <div class="bradcam_text text-center">
                    <h3>Lets have a talk</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /bradcam_area  -->

<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success" style="width:1010px">
                {{session('success')}}
            </div>
        @endif
            @if(session('error'))
                <div class="alert alert-success" style="width:1010px">
                    {{session('error')}}
                </div>
            @endif
        <div class="d-none d-sm-block mb-5 pb-4">
            <div id="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.337505934443!2d85.32048601483866!3d27.67596168347791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19cf4a0ae98f%3A0x9dd82c60d8b975c!2zTmFrYWJhaGlsLCDgpKfgpLLgpL7gpK_gpJrgpL4g4KSy4KSBLCBMYWxpdHB1ciA0NDYwMA!5e0!3m2!1sen!2snp!4v1586073777110!5m2!1sen!2snp"
                    width="1010" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Get in Touch</h2>
            </div>
            <div class="col-lg-8">
                <form action="{{route('contact.data')}}" method="post" class="form-contact contact_form">
                    @CSRF
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                          onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"
                                          placeholder='Enter Message'></textarea>
                                @error('message')
                                <p class="alert-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                       placeholder='Enter your name'>
                                @error('name')
                                <p class="alert-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                       placeholder='Enter email address'>
                                @error('email')
                                <p class="alert-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="subject" id="subject" type="text"
                                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                       placeholder='Enter Subject'>
                                @error('subject')
                                <p class="alert-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="button button-contactForm btn_4 boxed-btn">Send Message</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                    <div class="media-body">
                        <h3>Nakabahil, Patan.</h3>
                        <p>Lalitpur, Ward no - 16</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                    <div class="media-body">
                        <h3>+977 9860035972</h3>
                        <p>Mon to Fri 9am to 6pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                    <div class="media-body">
                        <h3>rahulshakya123rs@gmail.com</h3>
                        <p>Send me your query anytime!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

<!-- footer start -->
@include('frontend.footer')
