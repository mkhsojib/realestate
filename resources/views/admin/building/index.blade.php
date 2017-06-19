@extends('admin.layouts.layout')

@section('title')
    التحكم في العقارات
@endsection

@section('header')
    <!-- DataTables -->
    {!! Html::style('admin/plugins/datatables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            التحكم في العقارات
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="data" class="table table-responsive table-hover">
                            <thead>
                            <tr>
                                <th id="id" class="text-center">#</th>
                                <th class="text-center">اسم العقار</th>
                                <th class="text-center">السعر</th>
                                <th class="text-center">النوع</th>
                                <th class="text-center">اضيف في</th>
                                <th class="text-center">الحالة</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            </thead>

                            <tbody class="text-center">

                            </tbody>

                            <tfoot>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">اسم العقار</th>
                                <th class="text-center">السعر</th>
                                <th class="text-center">النوع</th>
                                <th class="text-center">اضيف في</th>
                                <th class="text-center">الحالة</th>
                                <th class="text-center">التحكم</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

@section('footer')
    <!-- DataTables -->
    {!! Html::script('admin/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('admin/plugins/datatables/dataTables.bootstrap.min.js') !!}

    <!-- page script -->
    <script>
        var lastIdx = null;

        $('#data thead th').each( function () {
            if($(this).index() == 0 ){
                var classname = $(this).index() == 6  ?  'date' : 'dateslash';
                var title = $(this).html();

                $(this).html( '<input type="text"  style="width:25px" class="' + 'text-center ' + classname + '" data-value="'+ $(this).index() +'" placeholder="'+title+'" />' );
            }
            else if($(this).index() < 5 ){
                var classname = $(this).index() == 6  ?  'date' : 'dateslash';
                var title = $(this).html();

                $(this).html( '<input type="text"  style="width:120px" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder="'+title+'" />' );
            }

            else if($(this).index() < 5 && $(this).index() !== 3 ){
                var classname = $(this).index() === 6  ?  'date' : 'dateslash';
                var title = $(this).html();

                $(this).html( '' +
                    '<input ' + 'type="text" class="' + classname + '" ' +
                        'data-value="'+ $(this).index() +'" placeholder=" '+title+'"/>' );
            }

            else if($(this).index() === 3){
                $(this).html(
                    '<select>' +
                    '<option>نوع العقار</option>' +
                    @foreach(building_type() as $key => $building)
                        '<option value="{{$key}}">{{$building}}</option>' +
                    @endforeach
                    '</select>' );
            }

            else if($(this).index() === 5){
                $(this).html(
                    '<select>' +
                        '<option>الحالة</option>' +
                        @foreach(status() as $key => $status)
                            '<option value="{{$key}}">{{$status}}</option>' +
                        @endforeach
                    '</select>' );
            }
        });

        var table = $('#data').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('/adminpanel/building/data') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'building_name', name: 'building_name'},
                {data: 'building_price', name: 'building_price'},
                {data: 'building_type', name: 'building_type'},
                {data: 'created_at', name: 'created_at'},
                {data: 'status', name: 'status'},
                {data: 'control', name: ''}
            ],
            "language": {
                "url": "{{ Request::root()  }}/admin/custom/Arabic.json"
            },
            "stateSave": false,
            "responsive": true,
            "order": [[0, 'desc']],
            "pagingType": "full_numbers",
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            iDisplayLength: 25,
            fixedHeader: true,

            "oTableTools": {
                "aButtons": [
                    {
                        "sExtends": "csv",
                        "sButtonText": "ملف اكسل",
                        "sCharSet": "utf16le"
                    },
                    {
                        "sExtends": "copy",
                        "sButtonText": "نسخ المعلومات"
                    },
                    {
                        "sExtends": "print",
                        "sButtonText": "طباعة",
                        "mColumns": "visible"
                    }
                ],

                "sSwfPath": "{{ Request::root()  }}/admin/custom/copy_csv_xls_pdf.swf"
            },

            "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
            ,initComplete: function ()
            {
                var r = $('#data tfoot tr');
                r.find('th').each(function(){
                    $(this).css('padding', 8);
                });
                $('#data thead').append(r);
                $('#search_0').css('text-align', 'center');
            }

        });

        table.columns().eq(0).each(function(colIdx) {
            $('input', table.column(colIdx).header()).on('keyup change', function() {
                table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });
        });

        table.columns().eq(0).each(function(colIdx) {
            $('select', table.column(colIdx).header()).on('change', function() {
                table
                    .column(colIdx)
                    .search(this.value)
                    .draw();
            });

            $('select', table.column(colIdx).header()).on('click', function(e) {
                e.stopPropagation();
            });
        });


        $('#data tbody')
            .on( 'mouseover', 'td', function () {
                var colIdx = table.cell(this).index().column;

                if ( colIdx !== lastIdx ) {
                    $( table.cells().nodes() ).removeClass( 'highlight' );
                    $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                }
            } )
            .on( 'mouseleave', function () {
                $( table.cells().nodes() ).removeClass( 'highlight' );
            } );
    </script>
@endsection
