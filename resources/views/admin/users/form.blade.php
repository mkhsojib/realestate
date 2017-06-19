{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">الاسم</label>

    <div class="col-md-6 col-offset-2">
        {{ Form::text(
                'name',
                null,
                [
                'placeholder' => 'الاسم',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
            ) }}

        @if ($errors->has('name'))
            <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
        @endif
    </div>
</div>

@if(!isset($if_user))
<div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">العضوية</label>

    <div class="col-md-6 col-offset-2">
        {{ Form::select(
                'admin',
                [NULL => 'user', '1' => 'admin'],
                null,
                [
                    'placeholder' => 'العضوية',
                    'style' => 'width: 100%; margin-bottom: 5px',
                    'class' => 'form-control'
                ]
            ) }}

        @if ($errors->has('admin'))
            <span class="help-block">
                    <strong>{{ $errors->first('admin') }}</strong>
                </span>
        @endif
    </div>
</div>
@endif

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">البريد الالكتروني</label>

    <div class="col-md-6 col-offset-2">
        {!! Form::text(
                'email',
                null,
                [
                'placeholder' => 'البريد الالكتروني',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
            ) !!}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

@if(! isset($user))
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">كلمة المرور</label>

        <div class="col-md-6 col-offset-2">
            <input id="password" type="password" class="form-control" name="password"
                   placeholder="كلمة المرور" required>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

<div class="form-group">
    <label for="password-confirm" class="col-md-4 control-label">تأكيد كلمة المرور</label>

    <div class="col-md-6 col-md-offset-2">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
               placeholder="تأكيد كلمة المرور" required>
    </div>
</div>
@endif

@if(url('adminpanel/users/create'))
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                اضف عضو
            </button>
        </div>
    </div>
@elseif(url('adminpanel/users/' . $user->id . '/edit'))
    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                تحديث البيانات
            </button>
        </div>
    </div>
@endif
