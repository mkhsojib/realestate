<div class="form-group{{ $errors->has('contact_name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">اسم المرسل</label>

    <div class="col-md-6">
        {{ Form::text(
            'contact_name',
            null,
            [
                'placeholder' => 'اسم المرسل',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('contact_name'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('contact_email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">البريد</label>

    <div class="col-md-6">
        {{ Form::text(
            'contact_email',
            null,
            [
                'placeholder' => 'البريد',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('contact_email'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('contact_message') ? ' has-error' : '' }}">
    <label for="message" class="col-md-4 control-label">الرسالة</label>

    <div class="col-md-6">
        {{ Form::textarea(
            'contact_message',
            null,
            [
                'placeholder' => 'الرسالة',
                'rows' => 5,
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('contact_message'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_message') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('contact_type') ? ' has-error' : '' }}">
    <label for="type" class="col-md-4 control-label">نوع الرسالة</label>

    <div class="col-md-6">
        {{ Form::select(
            'contact_type',
            contacts(),
            null,
            [
                'placeholder' => 'نوع الرسالة',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('contact_type'))
            <span class="help-block">
                <strong>{{ $errors->first('contact_type') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary col-md-6 text-center">
            ارسال
        </button>
    </div>
</div>

