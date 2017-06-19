@extends('layouts.app')

@section('title')
    تعديل المعلومات الشخصية
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
                    <li class="active"><a href="{{url('/')}}">تعديل المعلومات الشخصية</a></li>
                </ol>

                    {!! Form::model(
                        $user,
                        [
                            'route' => ['user/edit', $user->id],
                            'method' => 'PATCH'
                        ]
                    ) !!}
                    @include('admin/users/form', ['if_user' => 1])
                    {!! Form::close() !!}

                    <div class="clearfix"></div>

                    {!! Form::open([
                                'url' => ['user/change-password'],
                                'method' => 'POST'
                            ])
                        !!}
                    <input type="hidden" value="{{$user->id}}" name="user_id">

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">كلمة المرور الحاليه</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password"
                                   placeholder="كلمة المرور الحاليه" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>

                    <input type="hidden" value="{{$user->id}}" name="user_id">

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">تغير كلمة المرور</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="new_password"
                                   placeholder="تغير كلمة المرور" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                تحديث كلمة السر
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}

                    <div class="clearfix"></div>
            </div>
        </div>
    </div>
    </div>
@endsection
