{{ csrf_field() }}

<div class="form-group{{ $errors->has('building_name') ? ' has-error' : '' }}">
    <label for="building_name" class="col-md-4 control-label">اسم العقار</label>

    <div class="col-md-6">
        {{ Form::text(
            'building_name',
            null,
            [
                'placeholder' => 'اسم العقار',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('building_name'))
            <span class="help-block">
                <strong>{{ $errors->first('building_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('rooms') ? ' has-error' : '' }}">
    <label for="rooms" class="col-md-4 control-label">عدد الغرف</label>

    <div class="col-md-6">
        {{ Form::text(
            'rooms',
            null,
            [
                'placeholder' => 'عدد الغرف',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('rooms'))
            <span class="help-block">
                <strong>{{ $errors->first('rooms') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('building_price') ? ' has-error' : '' }}">
    <label for="building_price" class="col-md-4 control-label">سعر العقار</label>

    <div class="col-md-6">
        {{ Form::text(
            'building_price',
            null,
            [
                'placeholder' => 'السعر',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('admin'))
            <span class="help-block">
                <strong>{{ $errors->first('building_price') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('building_type') ? ' has-error' : '' }}">
    <label for="building_type" class="col-md-4 control-label">نوع العملية</label>

    <div class="col-md-6">
        {{ Form::select(
            'building_rent',
            building_rent(),
            null,
            [
                'placeholder' => 'نوع العملية',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('building_rent'))
            <span class="help-block">
                <strong>{{ $errors->first('building_rent') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('building_area') ? ' has-error' : '' }}">
    <label for="building_area" class="col-md-4 control-label">مساحة العقار</label>

    <div class="col-md-6">
        {{ Form::text(
            'building_area',
            null,
            [
                'placeholder' => 'مساحة العقار',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('building_area'))
            <span class="help-block">
                <strong>{{ $errors->first('building_area') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('building_type') ? ' has-error' : '' }}">
    <label for="building_type" class="col-md-4 control-label">نوع العقار</label>

    <div class="col-md-6">
        {{ Form::select(
            'building_type',
            building_type(),
            null,
            [
                'placeholder' => 'نوع العقار',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('building_type'))
            <span class="help-block">
                <strong>{{ $errors->first('building_type') }}</strong>
            </span>
        @endif
    </div>
</div>

@if(!isset($user))
<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    <label for="status" class="col-md-4 control-label">الحالة</label>

    <div class="col-md-6">
        {{ Form::select(
            'status',
            status(),
            null,
            [
                'placeholder' => 'الحالة',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
        @endif
    </div>
</div>
@endif

<div class="form-group{{ $errors->has('building_meta') ? ' has-error' : '' }}">
    <label for="building_meta" class="col-md-4 control-label">الكلمات الدلاليه</label>

    <div class="col-md-6">
        {{ Form::text(
            'building_meta',
            null,
            [
                'placeholder' => 'الكلمات الدلاليه',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('building_meta'))
            <span class="help-block">
                <strong>{{ $errors->first('building_meta') }}</strong>
            </span>
        @endif
    </div>
</div>

@if(!isset($user))
<div class="form-group{{ $errors->has('building_small_description') ? ' has-error' : '' }}">
    <label for="building_price" class="col-md-4 control-label">وصف العقار لمحركات البحث</label>

    <div class="col-md-6">
        {{ Form::textarea(
            'building_small_description',
            null,
            [
                'rows' => 5,
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('building_small_description'))
            <span class="help-block">
                <strong>{{ $errors->first('building_small_description') }}</strong>
            </span>
        @endif

        <div class="alert alert-warning">لا يمكن ادخال اكثر من 160 حرف</div>
    </div>
</div>
@endif

<div class="form-group{{ $errors->has('building_large_description') ? ' has-error' : '' }}">
    <label for="building_large_description" class="col-md-4 control-label">وصف مفصل للعقار</label>

    <div class="col-md-6">
        {{ Form::textarea(
            'building_large_description',
            null,
            [
                'rows' => 5,
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('building_large_description'))
            <span class="help-block">
                <strong>{{ $errors->first('building_large_description') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label for="building_large_description" class="col-md-4 control-label">صورة العقار</label>

    <div class="col-md-6">
        @if(isset($building))
            @if($building->image != '')
                <img src="{{Request::root() . '/building_images/' . $building->image}}" width="100px" style="float:right" alt="صورة العقار">
            @endif
        @endif
            <div class="clearfix"></div>
        {{ Form::file(
            'image',
            null,
            [
                'placeholder' => 'صورة العقار',
                'style' => 'width: 100%; margin-bottom: 5px',
                'class' => 'form-control'
            ]
        ) }}

        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 pull-left">
        <button type="submit" class="btn btn-primary col-md-6 text-center">
            اضف عقار
        </button>
    </div>
</div>
