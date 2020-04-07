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
                    <h3>Blog</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /bradcam_area  -->


<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @if(count($blog) > 0)
                        @foreach($blog as $key=>$value)
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="{{asset('storage/blog/'.$value->image)}}"
                                         alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3>{{date('d',strtotime($value->created_at))}}</h3>
                                        <p>{{date('F',strtotime($value->created_at))}}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="{{route('specific.blog',$value->id)}}">
                                        <h2>{{$value->title}}</h2>
                                    </a>
                                    <p>{{$value->summary}}</p>
                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="fa fa-user"></i> {{$value->category->name}}</a></li>
                                    </ul>
                                </div>
                            </article>
                        @endforeach
                        @else
                        <p class="alert alert-warning">No blogs available in the database</p>
                    @endif
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            {{$blog->links()}}
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="{{route('blog.search')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Search Keyword'
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Search Keyword'" name="search">
                                    <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search
                            </button>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            @if(count($category) > 0)
                                @foreach($category as $key=>$value)
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p>{{$value->name}}</p>&nbsp;
                                        </a>
                                    </li>
                                @endforeach
                                @else
                                <p class="alert alert-warning">No category in the database</p>
                            @endif
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        @if(count($recent) > 0)
                            @foreach($recent as $key=>$value)
                                <div class="media post_item">
                                    <img src="{{asset('storage/blog/'.$value->image)}}" style="max-width: 100px" alt="post">
                                    <div class="media-body">
                                        <a href="{{route('specific.blog',$value->id)}}">
                                            <h3>{{$value->title}}</h3>
                                        </a>
                                        <p>{{date('d F Y',strtotime($value->created_at))}}</p>
                                    </div>
                                </div>
                            @endforeach
                            @else
                            <p class="alert alert-warning"> No New Recent Posts</p>
                        @endif
                    </aside>
                    <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                            <li>
                                <a href="#">project</a>
                            </li>
                            <li>
                                <a href="#">love</a>
                            </li>
                            <li>
                                <a href="#">technology</a>
                            </li>
                            <li>
                                <a href="#">travel</a>
                            </li>
                            <li>
                                <a href="#">restaurant</a>
                            </li>
                            <li>
                                <a href="#">life style</a>
                            </li>
                            <li>
                                <a href="#">design</a>
                            </li>
                            <li>
                                <a href="#">illustration</a>
                            </li>
                        </ul>
                    </aside>


                    <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Facebook Page</h4>
                        <div class="fb-page facebook-page" style="width: 300px;" data-href="https://www.facebook.com/Rahul-Shakya-101216388216855/" data-width="450px" data-height="480px" data-hide-cover="false" data-show-facepile="true" data-show-posts="true" data-small-header="false"></div>
                        <script>(function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) return;
                                js = d.createElement(s); js.id = id;
                                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                        <!-- End facebook page -->

                </aside>


                    <aside class="single_sidebar_widget newsletter_widget" style="color:black !important;">
                        <h4 class="widget_title">Newsletter</h4>
                        <!-- Begin Mailchimp Signup Form -->
                        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
                        <style type="text/css">
                            #mc_embed_signup{background:inherit; clear:left; font:14px Helvetica,Arial,sans-serif; }
                            /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                               We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                        </style>
                        <div id="mc_embed_signup">
                            <form action="https://gmail.us3.list-manage.com/subscribe/post?u=0ef453ba6ad243d5d62c30423&amp;id=a3e9afd1f8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">

                                    <div class="mc-field-group">
                                        <input type="email" value="" style="margin-top:-20px;" name="EMAIL" placeholder="Enter you email address" class="required email" id="mce-EMAIL">
                                    </div>
                                    <div id="mce-responses" class="clear" style="color: white">
                                        <div class="response" id="mce-error-response" style="display:none;color: #0c0c0c !important"></div>
                                        <div class="response" id="mce-success-response" style="display:none;color: #0c0c0c !important"></div>
                                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;color: white" aria-hidden="true"><input type="text" name="b_0ef453ba6ad243d5d62c30423_a3e9afd1f8" tabindex="-1" value=""></div>
                                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button" style="border-radius:0px;background-color: green;color:white"></div>
                                </div>
                            </form>
                        </div>
                        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                        <!--End mc_embed_signup-->
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<!-- footer start -->
@include('frontend.footer')
