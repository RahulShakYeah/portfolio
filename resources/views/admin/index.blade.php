@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-success color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">201</h2>
                    <div class="m-b-5">NEW ORDERS</div><i class="ti-shopping-cart widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-info color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">1250</h2>
                    <div class="m-b-5">UNIQUE VIEWS</div><i class="ti-bar-chart widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-warning color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">$1570</h2>
                    <div class="m-b-5">TOTAL INCOME</div><i class="fa fa-money widget-stat-icon"></i>
                    <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="ibox bg-danger color-white widget-stat">
                <div class="ibox-body">
                    <h2 class="m-b-5 font-strong">108</h2>
                    <div class="m-b-5">NEW USERS</div><i class="ti-user widget-stat-icon"></i>
                    <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Latest Orders</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item">option 1</a>
                            <a class="dropdown-item">option 2</a>
                        </div>
                    </div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th width="91px">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <a href="invoice.html">AT2584</a>
                            </td>
                            <td>@Jack</td>
                            <td>$564.00</td>
                            <td>
                                <span class="badge badge-success">Shipped</span>
                            </td>
                            <td>10/07/2017</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="invoice.html">AT2575</a>
                            </td>
                            <td>@Amalia</td>
                            <td>$220.60</td>
                            <td>
                                <span class="badge badge-success">Shipped</span>
                            </td>
                            <td>10/07/2017</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="invoice.html">AT1204</a>
                            </td>
                            <td>@Emma</td>
                            <td>$760.00</td>
                            <td>
                                <span class="badge badge-default">Pending</span>
                            </td>
                            <td>10/07/2017</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="invoice.html">AT7578</a>
                            </td>
                            <td>@James</td>
                            <td>$87.60</td>
                            <td>
                                <span class="badge badge-warning">Expired</span>
                            </td>
                            <td>10/07/2017</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="invoice.html">AT0158</a>
                            </td>
                            <td>@Ava</td>
                            <td>$430.50</td>
                            <td>
                                <span class="badge badge-default">Pending</span>
                            </td>
                            <td>10/07/2017</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="invoice.html">AT0127</a>
                            </td>
                            <td>@Noah</td>
                            <td>$64.00</td>
                            <td>
                                <span class="badge badge-success">Shipped</span>
                            </td>
                            <td>10/07/2017</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
