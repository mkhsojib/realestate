@extends('layouts.app')

@section('title')
    تواصل معنا
@endsection

@section('header')
    {!! Html::style('admin/custom/building.css') !!}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="contact">
            <h1>تواصل معنا</h1>
            <div class="col-md-8">
                {{ Form::open(['url' => 'contact', 'method' => 'POST']) }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" class="form-control" id="name" name="contact_name" placeholder="الاسم" required="required" />
                            </div>

                            <div class="form-group">
                                <label for="email">البريد</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-envelope"></span>
                                    </div>
                                    <input type="email" class="form-control"
                                           id="email" name="contact_email" placeholder="البريد" required="required"
                                           value="{{Illuminate\Support\Facades\Auth::user() ? Illuminate\Support\Facades\Auth::user()->email : ''}}"
                                    />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject">الموضوع</label>
                                <select id="subject" name="contact_type" class="form-control" required="required">
                                    <option value="1" selected="">اختر واحدة:</option>
                                    @foreach(contacts() as $key => $contact)
                                        <option value="{{$key}}">{{$contact}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">الرسالة</label>
                                <textarea id="message" name="contact_message" class="form-control" rows="9" cols="25" required="required"
                                          placeholder="الرسالة"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" name="send" class="btn btn-primary pull-right" id="btnContactUs">
                                ارسال
                            </button>
                        </div>
                    </div>
                {{ form::close() }}
            </div>
            <div class="col-md-4">
                <form>
                    <legend><span class="fa fa-globe"></span> مكتبنا</legend>
                    <address>
                        العنوان:                     {{getSettings('address')}}<br>
                        هاتف:
                        {{getSettings('mobile')}}
                    </address>
                    <address>
                        <strong>{{getSettings()}}</strong><br>
                        <a href="mailto:#">first.last@example.com</a>
                    </address>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection