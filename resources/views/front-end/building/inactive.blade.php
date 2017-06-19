@extends('layouts.app')

@section('title')
    {{$message_title}}
@endsection

@section('header')
    {!! Html::style('admin/custom/building.css') !!}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('front-end/building/pages')

            <div class="col-md-9">
                <ol class="breadcrumb" style="background: #FFF; text-align: right; margin: 30px 0">
                    <li><a href="{{url('/')}}">الرئيسية</a></li>
                    <li><a href="{{url('/all-buildings')}}">كل العقارات</a></li>
                    <li><a href="{{url('/single-building' . $building_info->id)}}">{{$building_info->building_name}}</a></li>
                </ol>

                <div class="profile-content">
                    <div class="alert alert-danger text-center">
                        {{$message_body}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="//ct5.addthis.com/js/300/addthis_widget.js#pubid=ra-58fe7ca73f354667"></script>
@endsection
