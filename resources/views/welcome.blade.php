@extends('layouts.app')

@section('title')
    مرحبا بك زائرنا العزيز
@endsection

@section('header')
    <!-- Reset -->
    {!! Html::style('css/reset.css') !!}

    <!-- Product View -->
    {!! Html::style('css/product-view-style.css') !!}

    <!-- Modernizr -->
    {!! Html::script('js/modernizr.js')!!}
@endsection

@section('content')
    <div class="banner text-center">
        <div class="container">
            <div class="banner-info">
                <h1 style="margin-bottom: 15px">
                    اهلا و سهلا بك في                     {{getSettings()}}
                </h1>

                {!! Form::open([
                    'url' => 'search',
                    'method' => 'GET'
                ]) !!}
                <div class="row">
                    <div class="col-xs-6" style="float: right">
                        {!! Form::text(
                            'building_price_from',
                            null,
                            [
                                'placeholder' => 'سعر العقار من',
                                'style' => 'margin-bottom: 5px',
                                'class' => 'form-control'
                            ]
                        ) !!}
                    </div>

                    <div class="col-xs-6" style="float: right">
                        {!! Form::text(
                            'building_price_to',
                            null,
                            [
                                'placeholder' => 'سعر العقار الي',
                                'style' => 'margin-bottom: 5px',
                                'class' => 'form-control'
                            ]
                        ) !!}
                    </div>

                    <div class="col-xs-6" style="float: right">
                        {!! Form::select(
                            'rooms',
                            room_numbers(),
                            null,
                            [
                                'placeholder' => 'عدد الغرف',
                                'style' => 'margin-bottom: 5px',
                                'class' => 'form-control'
                            ]
                        ) !!}
                    </div>

                    <div class="col-xs-6" style="float: right">
                        {!! Form::select(
                            'building_type',
                            building_type(),
                            null,
                            [
                                'placeholder' => 'نوع العقار',
                                'style' => 'margin-bottom: 5px',
                                'class' => 'form-control'
                            ]
                        ) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6" style="float: right">
                        {!! Form::select(
                            'building_rent',
                            building_rent(),
                            null,
                            [
                                'placeholder' => 'نوع العملية',
                                'style' => 'margin-bottom: 30px',
                                'class' => 'form-control'
                            ]
                        ) !!}
                    </div>

                    <div class="col-xs-6" style="float: right">
                        {!! Form::text(
                            'building_area',
                            null,
                            [
                                'placeholder' => 'المساحة',
                                'style' => 'width: 100%',
                                'class' => 'form-control'
                            ]
                        ) !!}
                    </div>

                    <div class="col-lg-12">
                        {!! Form::submit(
                            'ابحث',
                            [
                                'class' => 'btn btn-info',
                                'style' => 'width: 100%'
                            ]
                        ) !!}
                    </div>
                </div>
                {!! Form::close() !!}

                <a class="banner_btn" href="{{url('user/add/building')}}" style="padding: 15px 45px">اضف عقار</a> </div>
        </div>
    </div>

        <div class="main">
            <h1 style="margin: 40px 0" class="text-center">اضيف مؤاخرا</h1>
            <ul class="cd-items cd-container">
                @foreach(\App\Building::take('8')->orderBy('id', 'desc')->where('status', 1)->get() as $building)
                        <li class="cd-item">
                            <img src="{{image_exist($building->image)}}" alt="{{$building->name}}" style="width: 257px; height: 178px;">
                            <a href="#0" data-id="{{$building->id}}" class="cd-trigger" style="color: #FFF;">نبذه سريعه</a>
                        </li> <!-- cd-item -->

                @endforeach
            </ul> <!-- cd-items -->

            <div class="cd-quick-view">
                <div class="cd-slider-wrapper">
                    <ul class="cd-slider">
                        <li class="selected">
                            <img src="img/item-1.jpg" alt="Product 1" class="image-box">
                        </li>
                    </ul> <!-- cd-slider -->
                </div> <!-- cd-slider-wrapper -->

                <div class="cd-item-info">
                    <h2 class="title-box"></h2>
                    <p class="description-box"></p>

                    <ul class="cd-item-action">
                        <li>
                            <a href="#0" class="add-to-cart price-box">Add to cart</a>
                        </li>

                        <li>
                            <a href="#0" class="more-box">المزيد</a>
                        </li>
                    </ul> <!-- cd-item-action -->
                </div> <!-- cd-item-info -->

                <a href="#0" class="cd-close">Close</a>
            </div> <!-- cd-quick-view -->
        </div>

@endsection

@section('footer')
    <!-- jQuery 2.1.1 -->
    {!! Html::script('js/jquery-2.1.1.js')!!}

    <!-- VelocityJS -->
    {!! Html::script('js/velocity.min.js')!!}

    <!-- Get URL -->
    <script>
        function getUrl() {
            return '{{Request::root()}}'
        }

        function noImageUrl() {
            return '{{getSettings('no_image')}}'
        }
    </script>

    <!-- Quick View JS File -->
    {!! Html::script('js/main.js')!!}
@endsection

