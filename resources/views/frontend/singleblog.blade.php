@section('og-title',$blog->title)
@section('meta-description'){!! $blog->summary !!}  @stop
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
                    <h3>{{$blog->category->name}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /bradcam_area  -->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 posts-list">
                @if($blog != null)
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{asset('uploads/blog/'.$blog->image)}}" alt="{{$blog->title}}">
                        </div>
                        <div class="blog_details">
                            <h2>{{$blog->title}}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="javascript:;"><i class="fa fa-user"></i> {{$blog->category->name}}</a></li>
                            </ul>
                            <p>
                                {!! html_entity_decode($blog->description) !!}
                            </p>
                            <small>Added By : {{$blog->user->name}} | Added on
                                : {{date('d F Y',strtotime($blog->created_at))}}</small>
                        </div>
                    </div>
                @endif
                <div class="navigation-top">
                    <div class="navigation-area">
                        <h2>Comments</h2>
                        <div class="row">
                            <div class="fb-comments" data-href="{{\Request::url()}}" data-width="100%"
                                 data-numposts="10"></div>
                        </div>
                    </div>
                </div>

                <div class="container">

                    <h1 class="font-weight-light mt-4 mb-4">Related Post</h1>
                    <div class="row">
                        @if(count($related))
                            @foreach($related as $key=>$value)
                                <div class="col-lg-3 col-md-4 col-6">
                                    <a href="{{route('specific.blog',$value->id)}}" class="d-block mb-4 h-100">
                                        <img class="img-fluid img-thumbnail"
                                             src="{{asset('storage/blog/'.$value->image)}}" alt="">
                                        <p>{{$value->title}}</p>
                                    </a>

                                </div>
                            @endforeach
                            @else
                            <p class="alert alert-warning mt-2">No related posts available</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->


<!-- footer start -->
@include('frontend.footer')
