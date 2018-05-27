<!DOCTYPE html>  
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset("plugins/images/whistle.jpg") }}">
    <title>Whistle</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset("bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ URL::asset("plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css") }}" rel="stylesheet">
    <link href="{{ URL::asset("plugins/bower_components/morrisjs/morris.css") }}" rel="stylesheet">
    @yield('other-styles')
    <!-- morris CSS -->
    <!-- animation CSS -->
    <link href="{{ URL::asset("css/animate.css") }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ URL::asset("css/style.css") }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ URL::asset("css/colors/default.css") }}" id="theme" rel="stylesheet">
    <link href="{{ URL::asset("plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css") }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o)
                , m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-19175540-9', 'auto');
        ga('send', 'pageview');
    </script>
</head>

<body>
    <!-- Preloader -->
    <!-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div> -->
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part">
                    <a class="logo" href="{{url("/tip/dashbaord")}}"><b>
                        <!-- <img src="{{ URL::asset("plugins/images/eliteadmin-logo.png") }}" alt="home" /></b> -->
                        <!-- <span class="hidden-xs"><img src="{{ URL::asset("plugins/images/eliteadmin-text.png") }}" alt="home" /></span> -->
                        <span class="">Whistle</span><!-- Find a logo for this one -->
                    </a>
                </div>
                <?php 
                    $userId= Auth::user()->id;
                    $newNotificationCount = DB::table('notifications')->where('to', $userId)->where('status', 0)->count();
                    $notifications= DB::table('notifications')->orderBy('status', 'asc')->take(8)->get();
                    $newMessageCount= DB::table('messages')->where('status', 0)->where('to', 'amowogbajegideon@gmail.com')->count();
                ?>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-bell"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
                        <ul class="dropdown-menu mailbox scale-up">
                            <li>
                                <div class="drop-title">You have {{$newNotificationCount}} new notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    @foreach($notifications as $notification)
                                        <a href="{{ url('/tip/read/notification/'.$notification->id) }}">
                                            <!-- <div class="user-img"> 
                                                @if(Auth::user()->pics_url == NULL)
                                                <img src="{{ URL::asset("plugins/images/users/pawandeep.jpg") }}" alt="user" class="img-circle"> 
                                                @else
                                                <img src="{{ URL::asset(Auth::user()->pics_url) }}" alt="user" class="img-circle">
                                                @endif 
                                                <span class="profile-status online pull-right"></span> 
                                            </div> -->
                                            <div class="mail-contnet">
                                                <h5>{{Auth::user()->firstname}}</h5> 
                                                <span class="mail-desc">{{$notification->message}}</span> 
                                                <span class="time">9:30 AM</span> 
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="{{ url('/tip/notification') }}"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{ URL::asset("plugins/images/users/varun.jpg") }}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{Auth::user()->firstname}}</b> </a>
                        <ul class="dropdown-menu dropdown-user scale-up">
                            <!-- <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li> -->
                            <li>
                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>

                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    
                   
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    
                    <li class="nav-small-cap m-t-10">--- Main Menu</li>
                    <li> <a href="{{url("tip/dashboard")}}" class="waves-effect active"><i class="zmdi zmdi-view-dashboard zmdi-hc-fw fa-fw" ></i> Dashboard </a>
                    </li>
                  
                    <li>
                        <a href="inbox.html" class="waves-effect">
                            <i class="zmdi zmdi-apps zmdi-hc-fw fa-fw"></i> 
                            <span class="hide-menu">Tips <span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url("/tip/list/new")}}">UnAttended</a></li>
                            <li><a href="{{url("/tip/list/old")}}">Attended</a></li>
                            <!-- <li><a href="javascript:void(0)" class="waves-effect">Messages<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li> <a href="inbox.html">Mail box</a></li>
                                    <li> <a href="inbox-detail.html">Inbox detail</a></li>
                                    <li> <a class="popup-youtube" href="{{ url('/message/compose')}}">Compose mail</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="waves-effect">
                            <i class="icon icon-envelope"></i> 
                            <span class="hide-menu">Messages 
                                @if($newMessageCount > 0)
                                    <span class="label label-rouded label-danger pull-right">{{$newMessageCount}}</span>
                                @endif

                                <span class="fa arrow"></span>
                            </span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li> <a class="popup-youtube" href="{{ url('/message/compose/'.Auth::user()->id)}}">Compose mail</a></li>
                            <li><a href="{{url("/tip/messages/old")}}">Read</a></li>
                            <li><a href="{{url("/tip/messages/new")}}">Unread</a></li>
                        </ul>
                    </li>
                   
                    <li>
                        <a href="{{ url('/logout')}}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit()";
                                    class="waves-effect">

                            <i class="icon-logout fa-fw"></i> 
                            <span class="hide-menu">Logout</span>
                            
                        </a>

                      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;"> {{ csrf_field() }} </form>
                    </li>
                </ul>
            </div>
        </div>
        @yield('content')
                <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{ URL::asset("plugins/bower_components/jquery/dist/jquery.min.js") }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset("bootstrap/dist/js/bootstrap.min.js") }}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ URL::asset("plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js") }}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ URL::asset("js/jquery.slimscroll.js") }}"></script>
    <!--Wave Effects -->
    <script src="{{ URL::asset("js/waves.js") }}"></script>

    <script src="{{ URL::asset("js/custom.min.js") }}"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="{{ URL::asset("plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js") }}"></script>
    <script src="{{ URL::asset("plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js") }}"></script>
    <!--Style Switcher -->
<script src="{{ URL::asset("plugins/bower_components/styleswitcher/jQuery.style.switcher.js") }}"></script>
@yield('other-scripts')
<script src="{{ URL::asset("plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js") }}"></script>
<script src="{{ URL::asset("plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js") }}"></script>
</body>

</html>