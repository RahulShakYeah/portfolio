
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
                    <h3>Videos</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /bradcam_area  -->


<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">

        <h1 class="font-weight-light mt-4 mb-4">Video Gallery</h1>
        <div class="row">
            @if(count($video))
                @foreach($video as $key=>$value)
                    <div class="col-lg-3 col-md-4 col-6 p-3">

                            <iframe src="https://www.youtube.com/embed/<?php echo $value->video_id?>"
                                    frameborder="0" allow="accelerometer" width="250" height="220px"
                                    allowfullscreen></iframe>


                    </div>
                @endforeach
            @else
                <p class="alert alert-warning mt-2">No Videos available</p>
            @endif
        </div>

    </div>
    <nav class="blog-pagination justify-content-center d-flex">
        <ul class="pagination">
            {{$video->links()}}
        </ul>
    </nav>
</section>
<!--================Blog Area =================-->

<!-- footer start -->
@include('frontend.footer')

