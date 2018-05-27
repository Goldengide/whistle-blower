@extends('layouts.admin')
@section('content')
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Home</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">New Whistle Notifications</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">{{$newWhistlesCount}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total No. Of Report</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">{{$tipsCount}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Messages</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">{{$messageCount}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Investigated Reports</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-down text-danger"></i> <span class="text-danger">{{$successfulReport}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/.row -->

            <!-- /.container-fluid -->
            <!-- <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer> -->
        </div>
@endsection
@section('other-styles')
    <link href="{{ URL::asset("plugins/bower_components/morrisjs/morris.css") }}" rel="stylesheet">
@endsection
@section('other-scripts')
        <!--weather icon -->
    <script src="{{ URL::asset("plugins/bower_components/skycons/skycons.js") }}"></script>
    <!--Counter js -->
    <script src="{{ URL::asset("plugins/bower_components/waypoints/lib/jquery.waypoints.js") }}"></script>
    <script src="{{ URL::asset("plugins/bower_components/counterup/jquery.counterup.min.js") }}"></script>
    <!--Morris JavaScript -->
    <script src="{{ URL::asset("plugins/bower_components/raphael/raphael-min.js") }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::asset("plugins/bower_components/morrisjs/morris.js") }}"></script>
    <script src="{{ URL::asset("js/dashboard4.js") }}"></script>

@endsection