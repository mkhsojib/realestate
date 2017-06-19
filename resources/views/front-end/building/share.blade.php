@if(count($allBuildings) > 0)
    <div class="row">
        @foreach($allBuildings as $building)
            <div class="col-xs-12 col-md-4 pull-right">
            <div class="thumbnail" >
                <img src="{{image_exist($building->image)}}" class="img-responsive" style="width: 257px; height: 178px;">
                <div class="caption">
                    <div class="row">
                        <ul class="list-unstyled" style="padding: 0">
                            <li class="text-center"><h3 style="margin: 0">{{$building->building_name}}</h3></li>
                        </ul>

                        <ul class="list-unstyled" style="padding: 0">
                            <li class="pull-right" style="padding: 5px">نوع العقار </li>

                            <li class="pull-right" style="padding: 5px">{{building_type()[$building->building_type]}}</li>

                            <li class="pull-left" style="padding: 5px; text-align: right; margin-left: 15px">{{$building->rooms}}</li>

                            <li class="pull-left" style="padding: 5px; text-align: right; margin-left: 8px">عدد الغرف </li>

                            <li class="pull-right" style="padding: 5px">المساحة </li>

                            <li class="pull-right" style="padding: 5px">{{$building->building_area}}</li>

                            <li class="pull-left" style="padding: 5px">{{building_type()[$building->building_rent]}}</li>

                            <li class="pull-left" style="padding: 5px">نوع العملية </li>
                        </ul>


                    </div>
                    <hr>
                    <p style="margin-bottom: 50px; text-align: right">
                        {{str_limit($building->building_small_description, 50)}}
                    </p>

                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 10px">
                            <a href="#" class="btn btn-success btn-product">السعر: {{$building->building_price}} جنيه</a>
                        </div>

                        @if($building->status == 0)
                        <div class="col-md-6 pull-left">
                            <span class="btn btn-danger btn-sm">في انتظار التفعيل</span>
                        </div>

                        <div class="col-md-6 pull-right">
                            <span><a class="btn btn-success btn-sm" href="{{url('user/edit/building/' . $building->id)}}"
                               style="width: 97px;">تعديل العقار</a></span>
                        </div>

                        @else
                        <div class="col-md-12">
                            <a href="{{url('single-building/' . $building->id)}}" class="btn btn-primary btn-product">تفاصيل اكثر</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@else
    <div class="alert alert-danger text-center">لا يوجد عقارات حاليا</div>
@endif