@extends('admin.layouts.layout')

@section('title')
    تعديل إعدادات الموقع
@endsection

@section('header')
    <!-- DataTables -->
    {!! Html::style('admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            تعديل إعدادات الموقع
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-header">
                        <h3 class="box-title">تعديل إعدادات الموقع</h3>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-body">
                        {{--<form action="{{url('adminpanel/sitesettings')}}" method="POST" enctype="multipart/form-data">--}}
                        {!! Form::model(
                        [
                            'url' => ['adminpanel/sitesettings'],
                            'method' => 'POST',
                            'files' => true
                        ]
                    ) !!}
                        {{csrf_field()}}

                    @foreach($siteSettings as $setting)
                                <div class="col-md-2">
                                    {{$setting->slug}}
                                </div>

                                <div class="col-md-10">
                                    @if($setting->type === 0)
                                        {{ Form::text(
                                            $setting->name_setting,
                                            $setting->value,
                                            [
                                                'class' => 'form-control',
                                                'style' => 'width: 100%; margin-bottom: 5px',
                                            ]
                                        ) }}

                                    @elseif($setting->type == 2)
                                        @if($setting->value != '')
                                            <img src="{{image_exist($setting->value, '/public/banner/', '/banner/')}}" alt="الصورة الريئيسية">
                                        @endif
                                            {{ Form::file(
                                                $setting->value,
                                                [
                                                'class' => 'form-control',
                                                'style' => 'width: 100%; margin-bottom: 5px',
                                            ]
                                            ) }}
                                    @else
                                        {{ Form::textarea(
                                            $setting->name_setting,
                                            $setting->value,
                                            [
                                                'class' => 'form-control',
                                                'style' => 'width: 100%; margin-bottom: 5px',
                                            ]
                                        ) }}
                                    @endif

                                    @if ($errors->has($setting->name_setting))
                                        <span class="help-block">
                                            <strong>{{ $errors->first($setting->name_setting) }}</strong>
                                        </span>
                                    @endif
                                </div>
                            @endforeach

                            <button type="submit" name="submit" class="btn btn-info" value="">
<i class="fa fa-save"></i>                                        حفظ إعدادات الموقع
                            </button>
                        {{--</form>--}}
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection