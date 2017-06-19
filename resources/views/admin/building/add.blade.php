@extends('admin/layouts/layout')

@section('title')
    إضافة عقار
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">اضف عقار</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::open(
                            [
                                'url' => 'adminpanel/building',
                                'method' => 'POST',
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
@endsection