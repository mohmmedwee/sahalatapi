<div class="form-group {{ $errors->has('hours') ? 'has-error' : ''}}  col-xs-6">
    {!! Form::label('hours', trans('general.hours'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8 input-group clockpicker " data-placement="bottom" data-align="top" data-autoclose="true">
        {!! Form::text('hours', null, ['class' => 'form-control']) !!}
        {!! $errors->first('hours', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group {{ $errors->has('create_date') ? 'has-error' : ''}}  col-xs-6">
    {!! Form::label('create_date', trans('general.create_date'), ['class' => 'col-sm-4 control-label']) !!}
    <div class="col-sm-8">
        {!! Form::text('create_date', null, ['class' => 'form-control mydatepicker']) !!}
        {!! $errors->first('create_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>


$request->merge(['create_date'=>Carbon::now()->addYear(1)->format('Y-m-d')]);


$request->merge(['purchasing_date'=>Carbon::now()->format('Y-m-d')]);