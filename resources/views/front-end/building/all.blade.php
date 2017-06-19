@extends('layouts.app')

@section('title')
    كل العقارات
@endsection

@section('header')
    {!! Html::style('admin/custom/building.css') !!}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('front-end/building/pages')

            <div class="col-xs-12 col-md-9">
                <ol class="breadcrumb" style="background: #FFF; text-align: right; margin: 30px 0">
                    <li><a href="{{url('/')}}">الرئيسية</a></li>

                    @if(isset($array))
                        @if(!empty($array))
                            @foreach($array as $key => $value)
                                <li><a href="{{url('/search?' . $key . '=' . $value)}}">{{field_name()[$key]}}: </a></li>

                                @if($key === 'building_type')
                                    {{building_type()[$value]}}
                                @elseif($key === 'building_rent')
                                    {{building_rent()[$value]}}
                                @else
                                    {{$value}}
                                @endif
                            @endforeach
                        @endif
                    @endif
                </ol>

                <div class="profile-content">
                    @include('front-end/building/share', ['allBuildings'])

                    <div class="clearfix"></div>

                    <div class="text-center">
                        {{
                            $allBuildings->links()
                        }}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
