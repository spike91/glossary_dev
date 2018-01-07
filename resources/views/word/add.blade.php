@extends('layouts.app')

@section('content')
<H3 align="center">@lang('sidebar.new')</H3>
<hr/>
   {!! Form::open(['url'=>'/et'] ) !!}<!-- Ссылка, куда отправить после нажатия на добавить-->
    <div class="form-group col-md-5 col-md-offset-7">
      {!! Form::label('russian', 'Слово на русском:') !!}
      {!! Form::text('russian', null, ['class'=>'form-control']) !!}
      {!! Form::label('english', 'Words in english:') !!}
      {!! Form::text('english', null, ['class'=>'form-control']) !!}
      {!! Form::label('estonian', 'Sõna eesti keeles:') !!}
      {!! Form::text('estonian', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-8 col-md-offset-4">
    {!! Form::label('russian', 'Описание на русском:') !!}
    {!! Form::text('russian', null, ['class'=>'form-control']) !!}
    {!! Form::label('english', 'Description in english:') !!}
    {!! Form::text('english', null, ['class'=>'form-control']) !!}
    {!! Form::label('estonian', 'Seletus eesti keeles:') !!}
    {!! Form::text('estonian', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-8 col-md-offset-4">
      {!! Form::label('image', 'Link:') !!}
      {!! Form::text('image', null, ['class'=>'form-control']) !!}
    </div>
    <!-- <div class="form-group col-md-6 col-md-offset-3">
      {!!Form::select('id_category', $categories_array, ['class'=>'form-control']) !!}
    </div> -->
    <div class="form-group col-md-8 col-md-offset-4">
      {!! Form::submit('Add word', ['class'=>'btn btn-info form-control']) !!}
    </div>
  {!! Form::close() !!}
@endsection