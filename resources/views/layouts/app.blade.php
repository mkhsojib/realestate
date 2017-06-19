<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{getSettings()}} @yield('title')
    </title>

    <!-- Styles -->
    {!! Html::style('css/bootstrap.css') !!}
    {!! Html::style('css/flexslider.css') !!}
    {!! Html::style('css/style.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/product-view-style.css') !!}

    <!-- Sweet Alert -->
    {!! Html::style('admin/dist/css/sweetalert2.min.css') !!}

    <!-- Scripts -->
    {!! Html::script('js/jquery.min.js') !!}

    <!-- SweetAlert -->
    {!! Html::script('admin/dist/js/sweetalert2.min.js')!!}

    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0); }
            , false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <link rel="stylesheet" type="text/css" href="//www.fontstatic.com/f=droid-naskh,bahij" />
    <style>
        *{
            font-family: 'bahij';
        }
    </style>

    @yield('header')
</head>
<body style="direction: rtl">
    <div id="app">
        <div class="header">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header pull-right">
                        <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-home"></i> بيتك</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="menu pull-left nav navbar-nav">
                        <li class="{{set_class(['all-buildings'], 'current')}}"><a href="{{url('all-buildings')}}">العقارات</a></li>

                        <li>
                            <a href="#" data-toggle="dropdown" role="button">
                                ايجار <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                @foreach(building_type() as $key => $type)
                                    <li style="width: 100%; text-align: right">
                                        <a href="{{url('/search?building_rent=1&building_type=' . $key)}}">{{$type}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li>
                            <a href="#" data-toggle="dropdown" role="button">
                                تمليك <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                @foreach(building_type() as $key => $type)
                                    <li style="width: 100%; text-align: right">
                                        <a href="{{url('/search?building_rent=0&building_type=' . $key)}}">{{$type}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li  class="{{set_class(['contact'], 'current')}}"><a href="{{url('contact')}}">اتصل بنا</a></li>

                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">الدخول</a></li>
                            <li><a href="{{ route('register') }}">عضوية جديدة</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                            الخروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
    @include('layouts/flashMessage')
    @yield('content')

    <footer>
        <div class="footer_bottom">
            <div class="follow-us">
                <a class="fa fa-facebook social-icon" href="{{getSettings('facebook')}}"></a>
                <a class="fa fa-twitter social-icon" href="{{getSettings('twitter')}}"></a>
                <a class="fa fa-linkedin social-icon" href="{{getSettings('linkedIn')}}"></a>
                <a class="fa fa-google-plus social-icon" href="{{getSettings('googlePlus')}}"></a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    {!! Html::script('js/responsive-nav.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/jquery.flexslider.js') !!}

    @yield('footer')

</body>
</html>
