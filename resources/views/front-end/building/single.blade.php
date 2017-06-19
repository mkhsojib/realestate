@extends('layouts.app')

@section('title')
    {{$building_info->building_name}}
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
                    <div class="col-md-3" style="float: right">
                        <table>
                            <tr>
                                <th colspan="3" class="text-center"><h1>{{$building_info->building_name}}</h1></th>
                            </tr>

                            <tr>
                                <td style="text-align: left">نوع العقار </td>
                                <td>&nbsp;&nbsp;</td>
                                <td style="text-align: right">{{building_type()[$building_info->building_type]}}</td>
                            </tr>

                            <tr>
                                <td style="text-align: left">عدد الغرف </td>
                                <td>&nbsp;&nbsp;</td>
                                <td style="text-align: right">{{$building_info->rooms}}</td>
                            </tr>

                            <tr>
                                <td style="text-align: left">المساحة </td>
                                <td>&nbsp;&nbsp;</td>
                                <td style="text-align: right">{{$building_info->building_area}}</td>
                            </tr>

                            <tr>
                                <td style="text-align: left">نوع العملية </td>
                                <td>&nbsp;&nbsp;</td>
                                <td style="text-align: right">{{building_type()[$building_info->building_rent]}}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-9">
                        <img src="{{image_exist($building_info->image)}}" alt="صورة العقار" class="img-responsive" style="float: left">
                    </div>
                    <hr>
                    <div class="clearfix"></div>

                    <p style="text-align: right">
                        {{$building_info->building_large_description}}
                    </p>
                </div>

                <div class="profile-content">
                    @include('front-end/building/share', ['allBuildings' => $same_rent])
                    @include('front-end/building/share', ['allBuildings' => $same_type])
                </div>
            </div>
        </div>
    </div>
@endsection