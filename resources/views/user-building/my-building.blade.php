@extends('layouts.app')

@section('title')
    عقارات المستخدم:     {{$user->name}}
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
                    <li><a href="{{url('all-buildings')}}">كل العقارات</a></li>
                    <li><a href="#">عقارات المستخدم: {{$user->name}}</a></li>
                </ol>

                <div class="profile-content">
                    @include('front-end/building/share', ['allBuildings' => $building])

                    <div class="clearfix"></div>

                    <div class="text-center">
                        {{
                            $building->links()
                        }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
