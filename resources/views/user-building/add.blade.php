@extends('layouts.app')

@section('title')
اضافة عقار جديد
@endsection

@section('header')
    {!! Html::style('admin/custom/building.css') !!}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @include('front-end/building/pages')

            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb" style="background: #FFF; text-align: right; margin-top: 30px">
                        <li><a href="{{url('/')}}">الرئيسية</a></li>
                        <li><a href="{{url('user/add/building')}}">اضافة عقار جديد</a></li>
                    </ol>

                    {!! Form::open(
                            [
                                'url' => 'user/add/building',
                                'method' => 'POST',
                                'files'  => true
                            ]
                        ) !!}
                    @include('admin/building/form', ['user' => 1])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
