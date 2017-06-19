<div class="col-md-3" style="text-align: right;">
    @if(Auth::user())
    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu" style="background: #FFF; margin-top: 30px;">
        <h3 style="padding: 10px; margin: 0">خيارات العضو</h3>

        <ul class="nav">
            <li class="{{set_class(['user', 'edit'])}} ">
                <a href="{{url('user', 'edit')}}">
                    <i class="fa fa-edit"></i> تعديل المعلومات الشخصية
                </a>
            </li>

            <li class="{{set_class(['user', 'my-buildings'])}}">
                <a href="{{url('user/my-buildings')}}">
                    <i class="fa fa-check"></i> العقارات المفعلة
                    <label style="float: left" class="label label-default">{{count_buildings(1, Auth::user()->id)}}</label>
                </a>
            </li>

            <li class="{{set_class(['user', 'my-buildings'])}}">
                <a href="{{url('user/inactive-building')}}">
                    <i class="fa fa-clock-o"></i> العقارات الغير المفعلة
                    <label style="float: left" class="label label-default">{{count_buildings(0, Auth::user()->id)}}</label>
                </a>
            </li>

            <li class="{{set_class(['user', 'add', 'building'])}}">
                <a href="{{url('user/add/building')}}">
                    <i class="fa fa-plus"></i> اضف عقار
                </a>
            </li>
        </ul>
    </div>
    @endif

    <div style="padding-top: 0">
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu" style="background: #FFF; margin-top: 30px;">
            <ul class="nav">

                <li class="{{set_class(['all-buildings'])}}">
                    <a href="{{url('all-buildings')}}">
                        <i class="fa fa-building"></i> كل العقارات
                    </a>
                </li>

                <li class="{{set_class(['for-rent'])}}">
                    <a href="{{url('for-rent')}}">
                        <i class="fa fa-calendar"></i> إيجار
                    </a>
                </li>

                <li class="{{set_class(['for-buy'])}}">
                    <a href="{{url('for-buy')}}">
                        <i class="fa fa-key"></i> تمليك
                    </a>
                </li>

                <li class="{{set_class(['type', '0'])}}">
                    <a href="{{url('type/0')}}">
                        <i class="fa fa-home"></i> الشقق
                    </a>
                </li>

                <li class="{{set_class(['type', '1'])}}">
                    <a href="{{url('type/1')}}">
                        <i class="fa fa-university"></i>                                                              الفيلل
                    </a>
                </li>

                <li class="{{set_class( ['type', '2'])}}">
                    <a href="{{url('type/2')}}">
                        <i class="fa fa-road"></i> الشاليهات
                    </a>
                </li>
            </ul>
        </div>
        <!-- END MENU -->
        <div class="profile-usermenu" style="padding: 10px; background: #FFF">
            <h3 class="text-center">البحث المتقدم</h3>

            {!! Form::open([
                    'url' => 'search',
                    'method' => 'GET'
                ]) !!}

            <div class="form-group">
                {!! Form::text(
                    'building_price_from',
                    null,
                    [
                        'placeholder' => 'سعر العقار من',
                        'style' => 'width: 100%'
                    ]
                ) !!}
            </div>

            <div class="form-group">
                {!! Form::text(
                    'building_price_to',
                    null,
                    [
                        'placeholder' => 'سعر العقار الي',
                        'style' => 'width: 100%'
                    ]
                ) !!}
            </div>

            <div class="form-group">
                {!! Form::select(
                    'rooms',
                    room_numbers(),
                    null,
                    [
                        'placeholder' => 'عدد الغرف',
                        'style' => 'width: 100%'
                    ]
                ) !!}
            </div>

            <div class="form-group">
                {!! Form::select(
                    'building_type',
                    building_type(),
                    null,
                    [
                        'placeholder' => 'نوع العقار',
                        'style' => 'width: 100%'
                    ]
                ) !!}
            </div>

            <div class="form-group">
                {!! Form::select(
                    'building_rent',
                    building_rent(),
                    null,
                    [
                        'placeholder' => 'نوع العملية',
                        'style' => 'width: 100%'
                    ]
                ) !!}
            </div>

            <div class="form-group">
                {!! Form::text(
                    'building_area',
                    null,
                    [
                        'placeholder' => 'المساحة',
                        'style' => 'width: 100%'
                    ]
                ) !!}
            </div>

            <div class="form-group">
                {!! Form::submit(
                    'ابحث',
                    [
                        'class' => 'btn btn-info',
                        'style' => 'width: 100%'
                    ]
                ) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>