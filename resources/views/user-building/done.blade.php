@extends('layouts.app')

@section('title')
    تم اضافة العقار بنجاح
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

                    <div class="profile-content">
                        <div class="alert alert-success text-center">تم اضافة العقار بنجاح</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
