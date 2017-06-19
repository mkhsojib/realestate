@extends('admin/layouts/layout')

@section('title')
 تعديل رسالة {{$contact->contact_name}}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
تعديل رسالة {{$contact->contact_name}}
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        {!! Form::model(
                            $contact,
                            [
                                'url' => ['adminpanel/contact', $contact->id],
                                'method' => 'PATCH'
                            ]
                        ) !!}
                        @include('admin/contact/form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection