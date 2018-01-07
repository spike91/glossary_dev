@extends('layouts.app')

@section('content')
   {!! Form::open() !!}<!-- Ссылка, куда отправить после нажатия на добавить-->
    <div class="form-group col-md-6 col-md-offset-4">
      {!! Form::label('russian', 'Название категории на русском:') !!}
      {!! Form::text('russian', null, ['class'=>'form-control']) !!}
      {!! Form::label('english', 'Category name in English:') !!}
      {!! Form::text('english', null, ['class'=>'form-control']) !!}
      {!! Form::label('estonian', 'Kategooria nimi eesti keeles:') !!}
      {!! Form::text('estonian', null, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-6 col-md-offset-4">
      {!! Form::submit('Add category', ['class'=>'btn btn-info form-control']) !!}
    </div>
  {!! Form::close() !!}
@endsection