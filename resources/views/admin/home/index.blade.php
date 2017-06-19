@extends('admin.layouts.layout')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people"></i></span>

                    <div class="info-box-content" style="text-align: right">
                        <span class="info-box-text">عدد الاعضاء<br><br></span>
                        <span class="info-box-number">{{$users_count}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-home"></i></span>

                    <div class="info-box-content" style="text-align: right">
                        <span class="info-box-text">عدد العقارات المفعلة<br><br></span>
                        <span class="info-box-number">{{$active_buildings_count}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-home-outline"></i></span>

                    <div class="info-box-content" style="text-align: right">
                        <span class="info-box-text">عدد العقارات الغير<br>مفعلة</span>
                        <span class="info-box-number">{{$inactive_buildings_count}}</span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-email-outline"></i></span>

                    <div class="info-box-content" style="text-align: right">
                        <span class="info-box-text">عدد الرسائل<br><br></span>
                        <span class="info-box-number">{{$emails_count}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.content -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title pull-right">العقارات المضافة خلال سنة {{$year}}</h3>

                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-wrench"></i>
                                    </button>
                                </div>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="hidden-xs col-md-12">
                                    <div class="chart">
                                        <!-- Sales Chart Canvas -->
                                        <canvas width="705" height="180" id="salesChart" style="height: 180px; width: 705px;"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>

        <div class="row">
            <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title pull-right">اخر الاعضاء المسجلين</h3>

                        <div class="box-tools pull-right">
                            <span class="label label-danger">{{$users_count}} عضو</span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">الاسم</th>
                                    <th class="text-center">العضوية</th>
                                    <th class="text-center">اضيف في</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($latest_users as $user)
                                   <tr>
                                       <td class="text-center">
                                           {{$user->id}}
                                       </td>

                                       <td class="text-center">
                                           <a href="{{url('adminpanel/users/' . $user->id . '/edit')}}">
                                               {{$user->name}}
                                           </a>
                                       </td>

                                       @if($user->admin == 0)
                                           <td class="text-center">
                                               عضو
                                           </td>
                                       @else
                                           <td class="text-center">
                                               مدير
                                           </td>
                                       @endif
                                       <td class="text-center">{{$user->created_at}}</td>
                                   </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- /.users-list -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{url('adminpanel/users')}}">كل الاعضاء</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title pull-right">عقارات اضيفت مؤخرا</h3>

                        <div class="box-tools pull-right">
                            <span class="label label-danger">{{$active_buildings_count}} عقار</span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($latest_buildings as $building)
                                <li class="item">
                                    <div class="product-img pull-right">
                                        <img src="@if($building->image != '') building_images/{{$building->image}} @else {{getSettings('no_image')}} @endif"
                                             style="width: 60px; height: 60px; margin-right: 10px" alt="{{$building->building_name}}">
                                    </div>

                                    <div class="product-info">
                                        <a href="{{url('adminpanel/building/' . $building->id . '/edit')}}"
                                           style="margin-right: 5px" class="pull-right">
                                            {{$building->building_name}}
                                        </a>

                                        <span class="label label-warning pull-left" style="text-align: left">
                                            {{$building->building_price}}
                                        </span>
                                        <br>
                                        <span class="product-description" style="padding-right: 5px; text-align: right">
                                            {{$building->building_small_description}}
                                        </span>
                                    </div>
                                </li>
                            @endforeach
                            <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="{{url('adminpanel/building')}}">كل العقارات</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection


@section('footer')
    <script>
        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $("#salesChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);

        var salesChartData = {
            labels: ["يناير", "فبراير", "مارس", "ابريل", "مايو", "يونيو", "يوليو", "اغسطس", "سبتمبر", "اكتوبر", "نوفمبر", "ديسمبر"],
            datasets: [
                {
                    label: "Digital Goods",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [
                        @foreach($new_array as $data)
                        @if(is_array($data))
                        {{$data['count']}},
                        @else
                        {{$data}},
                        @endif
                        @endforeach
                    ]
                }
            ]
        };

        var salesChartOptions = {
            //Boolean - If we should show the scale at all
            showScale: true,
            //Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: false,
            //String - Colour of the grid lines
            scaleGridLineColor: "rgba(0,0,0,.05)",
            //Number - Width of the grid lines
            scaleGridLineWidth: 1,
            //Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            //Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            //Boolean - Whether the line is curved between points
            bezierCurve: true,
            //Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            //Boolean - Whether to show a dot for each point
            pointDot: false,
            //Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            //Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            //Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            //Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            //Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            //String - A legend template
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%=datasets[i].label%></li><%}%></ul>",
    //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: true,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true
  };

  //Create the line chart
  salesChart.Line(salesChartData, salesChartOptions);

    </script>
@endsection