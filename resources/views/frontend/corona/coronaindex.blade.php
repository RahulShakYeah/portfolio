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
                    <h3>Corona Real Time Tracker</h3>
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
            <div class="col-lg-12 mb-2 mb-lg-0">
                <div class="counter_area" style="margin-top:-120px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-4 col-md-4">
                                <div class="single_counter text-center">
                                    <h3>
                                        <span>{{$data['tested_total']}}</span>
                                    </h3>
                                    <p>Total Tested</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4">
                                <div class="single_counter text-center">
                                    <h3>
                                        <span>{{$data['tested_positive']}}</span>
                                    </h3>
                                    <p>Total Positive</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4">
                                <div class="single_counter text-center">
                                    <h3>
                                        <span>{{$data['tested_negative']}}</span>
                                    </h3>
                                    <p>Tested Negative</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4">
                                <div class="single_counter text-center">
                                    <h3>
                                        <span>{{$data['in_isolation']}}</span>
                                    </h3>
                                    <p>In Isolation</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4">
                                <div class="single_counter text-center">
                                    <h3>
                                        <span>{{$data['deaths']}}</span>
                                    </h3>
                                    <p>Deaths</p>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4">
                                <div class="single_counter text-center">
                                    <h3>
                                        <span>{{$data['recovered']}}</span>
                                    </h3>
                                    <p>Recovered</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12" style="margin-top: -20px">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="usertable">
                        <thead class="thead-dark">
                        <th>S.N</th>
                        <th>Country</th>
                        <th>Total Cases</th>
                        <th>New Cases</th>
                        <th>Total Deaths</th>
                        <th>New Deaths</th>
                        <th>Active Cases</th>
                        <th>Total Recovered</th>
                        <th>Critical Cases</th>
                        </thead>
                        <tbody>
                        @for($i=0;$i<(count($world));$i++)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$world[$i]['country']}}</td>
                                <td>{{$world[$i]['totalCases']}}</td>
                                <td class="alert alert-warning">+ {{$world[$i]['newCases']}}</td>
                                <td>{{$world[$i]['totalDeaths']}}</td>
                                <td class="alert alert-danger">+ {{$world[$i]['newDeaths']}}</td>
                                <td>{{$world[$i]['activeCases']}}</td>
                                <td>{{$world[$i]['totalRecovered']}}</td>
                                <td>{{$world[$i]['criticalCases']}}</td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->

<!-- footer start -->
@include('frontend.footer')
