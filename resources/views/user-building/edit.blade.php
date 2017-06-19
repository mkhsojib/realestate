@extends('layouts.app')

@section('title')
    تعديل العقار {{$building->building_name}}
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
                    <li><a href="{{url('user/inactive-building')}}">عقارات غير مفعلة</a></li>
                    <li><a href="{{url('user/edit/building/' . $building->id)}}">تعديل العقار {{$building->building_name}}</a></li>
                </ol>

                <div class="profile-content">

                    {!! Form::model(
                            $building,
                            [
                                'url' => 'user/update/building',
                                'method' => 'PATCH',
                                'files'  => true
                            ]
                        ) !!}
                    <input type="hidden" name="building_id" value="{{$building->id}}">
                    @include('admin/building/form', ['user' => 1])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
