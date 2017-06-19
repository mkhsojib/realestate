@extends('admin/layouts/layout')

@section('title')
     تعديل العقار {{$building->building_name}}
@endsection

@section('header')
    {!! Html::style('admin/custom/select2.css') !!}

@section('content')
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    تعديل العقار {{$building->building_name}}
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                {!! Form::model(
                                    $building,
                                    [
                                        'url' => ['adminpanel/building', $building->id],
                                        'method' => 'PATCH',
                                        'files' => true
                                    ]
                                ) !!}

                                @include('admin/building/form')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

@endsection

@section('footer')
    {!! Html::script('admin/custom/select2.full.min.js') !!}
@endsection