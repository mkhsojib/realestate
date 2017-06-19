<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        لوحة تحكم الموقع {{getSettings()}}
        @yield('title')
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.6 -->
    {!! Html::style('/admin/bootstrap/css/bootstrap.css') !!}

    <!-- Sweet Alert -->
    {!! Html::style('/admin/dist/css/sweetalert2.min.css') !!}

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- jvectormap -->
    {!! Html::style('/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}

    <!-- Theme style -->
    {!! Html::style('/admin/dist/css/AdminLTE.css') !!}

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {!! Html::style('/admin/dist/css/skins/_all-skins.min.css') !!}

    <link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=droid-naskh,bahij" />
    <style>
        *{
            font-family: 'bahij';
        }
    </style>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('header')
</head>
<body class="hold-transition skin-blue sidebar-mini" dir="rtl">

<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="{{url('/adminpanel')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">لوحة التحكم</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu pull-left">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li style="float: right" class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">{{count_messages()}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header" style="text-align: right">لديك  {{count_messages()}} رسائل جديدة</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <!-- start message -->
                                    @foreach(unread_message() as $unread_message => $message)
                                        <li>
                                            <a href="{{url('/adminpanel/contact/' . $message->id . '/edit')}}">
                                                <h4 style="text-align: right; margin-right: 0">
                                                    {{$message->contact_name}}
                                                    <small class="pull-left">{{$message->created_at}} <i class="fa fa-clock-o"></i></small>
                                                </h4>
                                                <p style="margin-left: 0">{{$message->contact_message, 10}}</p>
                                            </a>
                                        </li>
                                    @endforeach
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer"><a href="{{url('adminpanel/contact')}}">كل الرسائل</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li style="float: right" class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">{{count_inactive_buildings(0)}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header" style="text-align: right">لديك {{count_inactive_buildings(0)}}  عقار غير مفعل</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        @foreach(App\Building::where('status', 0)->get() as $building)
                                        <li>
                                            <a href="{{url('adminpanel/change-status/' . $building->id . '/1')}}">
                                                <span class="pull-right">
                                                    {{$building->building_name}}
                                                </span>

                                                <i class="fa fa-check pull-left"></i>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="footer"><a href="{{url('adminpanel/building')}}">كل العقارات</a></li>
                            </ul>
                        </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{Auth::user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        {{Auth::user()->name}}
                                        <small>{{Auth::user()->created_at}}</small>
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="{{url('adminpanel/users/' . Auth::user()->id . '/edit')}}" class="btn btn-default btn-flat">
    الملف الشخصي
                                        </a>
                                    </div>
                                    <div class="pull-left">
                                        <a href="{{route('logout')}}" class="btn btn-default btn-flat">تسجيل الخروج</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                </ul>
            </div>

        </nav>
    </header>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section style="height: auto;" class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                    <div class="pull-left image">
                    <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input name="q" class="form-control" placeholder="Search..." type="text">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                @include('admin.layouts.navigation')
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

<!-- ./wrapper -->

<!-- JavaScript -->

<!-- jQuery 2.2.3 -->
{!! Html::script('/admin/plugins/jQuery/jquery-2.2.3.min.js') !!}
<!-- Bootstrap 3.3.6 -->
{!! Html::script('/admin/bootstrap/js/bootstrap.min.js') !!}
<!-- FastClick -->
{!! Html::script('/admin/plugins/fastclick/fastclick.js') !!}
<!-- AdminLTE App -->
{!! Html::script('/admin/dist/js/app.min.js') !!}
<!-- Sparkline -->
{!! Html::script('/admin/plugins/sparkline/jquery.sparkline.min.js') !!}
<!-- jvectormap -->
{!! Html::script('/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
<!-- SlimScroll 1.3.0 -->
{!! Html::script('/admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}
<!-- ChartJS 1.0.1 -->
{!! Html::script('/admin/plugins/chartjs/Chart.min.js') !!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{!! Html::script('/admin/dist/js/pages/dashboard2.js') !!}
<!-- AdminLTE for demo purposes -->
{!! Html::script('/admin/dist/js/demo.js') !!}

<!-- SweetAlert -->
{!! Html::script('/admin/dist/js/sweetalert2.min.js')!!}

@include('/admin/layouts/flashMessage')
@yield('footer')
</body>
</html>