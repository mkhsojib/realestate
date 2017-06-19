@extends('admin/layouts/layout')

@section('title')
    تعديل عضو {{$user->name}}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
تعديل العضو {{$user->name}}
        </h1>
    </section>

    <div class="row" style="padding: 25px">
        <div class="col-xs-12 col-md-5">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    {!! Form::model(
                        $user,
                        [
                            'url' => ['adminpanel/users', $user->id],
                            'method' => 'PATCH'
                        ]
                    ) !!}
                        @include('admin/users/form')
                    {!! Form::close() !!}


                    {!! Form::open([
                            'url' => ['adminpanel/user/changepassword'],
                            'method' => 'POST'
                        ])
                    !!}
                        <input type="hidden" value="{{$user->id}}" name="user_id">

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">تغير كلمة المرور</label>

                            <div class="col-md-6 col-md-offset-2">
                                <input id="password" type="password" class="form-control" name="password"
                                style="width:100%; margin: 5px 0" placeholder="تغير كلمة المرور" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                                            تحديث كلمة السر
                                </button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-7">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs pull-right" style="padding: 0">
                    <li class="active"><a href="#active_buildings" data-toggle="tab">عقارات مفعلة</a></li>
                    <li><a href="#inactive_buildings" data-toggle="tab">عقارات غير مفعلة</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="active_buildings">
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-center">اسم العقار</td>
                                <td class="text-center">نوع العقار</td>
                                <td class="text-center">سعر العقار</td>
                                <td class="text-center">مساحة العقار</td>
                                <td class="text-center">نوع العملية</td>
                                <td class="text-center">اضيف في</td>
                                <td class="text-center">حالة العقار</td>
                            </tr>

                            @foreach($building_active as $building)
                                <tr>
                                    <td class="text-center">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="{{url('adminpanel/building/' . $building->id . '/edit/')}}">
                                                    {{$building->building_name}}
                                                </a>
                                            </li>
                                        </ul>
                                    </td>

                                    <td class="text-center">
                                        {{building_type()[$building->building_type]}}
                                    </td>

                                    <td class="text-center">
                                        {{$building->building_price}}
                                    </td>

                                    <td class="text-center">
                                        {{$building->building_area}}
                                    </td>

                                    <td class="text-center">
                                        {{building_rent()[$building->building_rent]}}
                                    </td>

                                    <td class="text-center">
                                        {{$building->created_at}}
                                    </td>

                                    <td class="text-center">
                                        <a href="{{url('adminpanel/change-status/' . $building->id . '/0')}}">الغاء تفعيل العقار</a>
                                    </td>
                                </tr>
                            @endforeach
                            {{ $building_active->links() }}
                        </table>

                        <div class="text-center">
                            {{$building_active->appends(Request::except('page'))->render()}}
                        </div>
                    </div>

                    <div class="tab-pane" id="inactive_buildings">
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-center">اسم العقار</td>
                                <td class="text-center">نوع العقار</td>
                                <td class="text-center">سعر العقار</td>
                                <td class="text-center">مساحة العقار</td>
                                <td class="text-center">اضيف في</td>
                                <td class="text-center">حالة العقار</td>
                            </tr>

                            @foreach($building_inactive as $building)
                                <tr>
                                    <td class="text-center">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="{{url('adminpanel/building/' . $building->id . '/edit/')}}">
                                                    {{$building->building_name}}
                                                </a>
                                            </li>
                                        </ul>
                                    </td>

                                    <td class="text-center">
                                        {{building_type()[$building->building_type]}}
                                    </td>

                                    <td class="text-center">
                                        {{$building->building_price}}
                                    </td>

                                    <td class="text-center">
                                        {{$building->building_area}}
                                    </td>

                                    <td class="text-center">
                                        {{$building->created_at}}
                                    </td>

                                    <td class="text-center">
                                        <a href="{{url('adminpanel/change-status/' . $building->id . '/1')}}">تفعيل العقار</a>
                                    </td>
                                </tr>
                            @endforeach

                            {{ $building_inactive->links() }}
                        </table>

                        <div class="text-center">
                            {{$building_inactive->appends(Request::except('page'))->render()}}
                        </div>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
    </div>


@endsection

@section('footer')
@endsection