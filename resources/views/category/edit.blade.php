@extends('layouts.app')

@section('content')
{!! Form::open(['url'=> LaravelLocalization::getLocalizedURL(null, 'category/save/'.$category->id, [], true), 'method' => 'get', 'id' => 'category-add-form']) !!}<!-- Ссылка, куда отправить после нажатия на добавить-->
    <div class="form-group col-md-6 col-md-offset-4">
      {!! Form::label('russian', 'Название категории на русском:') !!}
      {!! Form::text('russian', $category->russian, ['class'=>'form-control','maxlength' => 60,'required']) !!}
      {!! Form::label('english', 'Category name in English:') !!}
      {!! Form::text('english', $category->english, ['class'=>'form-control','maxlength' => 60,'required']) !!}
      {!! Form::label('estonian', 'Kategooria nimi eesti keeles:') !!}
      {!! Form::text('estonian', $category->estonian, ['class'=>'form-control','maxlength' => 60,'required']) !!}
    </div>
    <div class="form-group col-md-6 col-md-offset-4">
      {!! Form::submit(__('Edit category'), ['class'=>'btn btn-info form-control']) !!}
    </div>
  {!! Form::close() !!}
@endsection