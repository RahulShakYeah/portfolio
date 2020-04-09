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
                    <h3>Corona Virus</h3>
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
                @for($i=0;$i<=10;$i++)
                    <div class="media mb-3">
                        <img class="mr-3" src=" {{$news['data'][$i]['image_url']}}" style="max-width: 200px" alt="Generic placeholder image">
                        <div class="media-body">
                            <h3 class="mt-0">          {{$news['data'][$i]['title']}}</h3>
                       {{$news['data'][$i]['summary']}}
                        </div>
                    </div>
                    @endfor
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">


                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Nepal Corona update</h4>
                        <ul class="list cat-list">

                            <li>Tested positive : {{$response['tested_positive']}}</li>
                            <li>Tested negative : {{$response['tested_negative']}}</li>
                            <li>Tested total : {{$response['tested_total']}}</li>
                            <li>In isolation : {{$response['in_isolation']}}</li>
                            <li>Pending result : {{$response['pending_result']}}</li>
                            <li>Deaths : {{$response['deaths']}}</li>
                            <li>Recovered : {{$response['recovered']}}</li>
                            <li>Updated at : {{$response['latest_sit_report']['date']}}</li>
                            <small><a href="{{$response['source']}}" target="_blank">Source</a></small>


                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">World Corona update</h4>
                        <ul class="list cat-list">
                            <li>Total Cases : {{($world[0]['totalCases'])}}</li>
                            <li>New Cases : {{($world[0]['newCases'])}}</li>
                            <li>Total Recovered : {{($world[0]['totalRecovered'])}}</li>
                            <li>Critical Cases : {{($world[0]['criticalCases'])}}</li>
                            <li>Total Deaths : {{($world[0]['totalDeaths'])}}</li>
                            <li>New Deaths : {{($world[0]['newDeaths'])}}</li>


                        </ul>
                    </aside>

                    {{--                    <aside class="single_sidebar_widget popular_post_widget">--}}
                    {{--                        <h3 class="widget_title">Recent Post</h3>--}}
                    {{--                        @if(count($recent) > 0)--}}
                    {{--                            @foreach($recent as $key=>$value)--}}
                    {{--                                <div class="media post_item">--}}
                    {{--                                    <img src="{{asset('storage/blog/'.$value->image)}}" style="max-width: 100px" alt="post">--}}
                    {{--                                    <div class="media-body">--}}
                    {{--                                        <a href="{{route('specific.blog',$value->id)}}">--}}
                    {{--                                            <h3>{{$value->title}}</h3>--}}
                    {{--                                        </a>--}}
                    {{--                                        <p>{{date('d F Y',strtotime($value->created_at))}}</p>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            @endforeach--}}
                    {{--                        @else--}}
                    {{--                            <p class="alert alert-warning"> No New Recent Posts</p>--}}
                    {{--                        @endif--}}
                    {{--                    </aside>--}}

                    <aside class="single_sidebar_widget newsletter_widget" style="color:black !important;">
                        <h4 class="widget_title">Newsletter</h4>
                        <!-- Begin Mailchimp Signup Form -->
                        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet"
                              type="text/css">
                        <style type="text/css">
                            #mc_embed_signup {
                                background: inherit;
                                clear: left;
                                font: 14px Helvetica, Arial, sans-serif;
                            }

                            /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                               We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                        </style>
                        <div id="mc_embed_signup">
                            <form
                                action="https://gmail.us3.list-manage.com/subscribe/post?u=0ef453ba6ad243d5d62c30423&amp;id=a3e9afd1f8"
                                method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">

                                    <div class="mc-field-group">
                                        <input type="email" value="" style="margin-top:-20px;" name="EMAIL"
                                               placeholder="Enter you email address" class="required email"
                                               id="mce-EMAIL">
                                    </div>
                                    <div id="mce-responses" class="clear" style="color: white">
                                        <div class="response" id="mce-error-response"
                                             style="display:none;color: #0c0c0c !important"></div>
                                        <div class="response" id="mce-success-response"
                                             style="display:none;color: #0c0c0c !important"></div>
                                    </div>
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;color: white" aria-hidden="true">
                                        <input type="text" name="b_0ef453ba6ad243d5d62c30423_a3e9afd1f8" tabindex="-1"
                                               value=""></div>
                                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe"
                                                              id="mc-embedded-subscribe" class="button"
                                                              style="border-radius:0px;background-color: green;color:white">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script type='text/javascript'
                                src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
                        <script type='text/javascript'>(function ($) {
                                window.fnames = new Array();
                                window.ftypes = new Array();
                                fnames[0] = 'EMAIL';
                                ftypes[0] = 'email';
                            }(jQuery));
                            var $mcj = jQuery.noConflict(true);</script>
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
