@extends('layouts.app')
<?php $categoryName = strtolower(LaravelLocalization::getCurrentLocaleName())?>
@section('content')
<H3 align="center">@lang('sidebar.new')</H3>
<hr/>
{!! Form::open(['url'=> LaravelLocalization::getLocalizedURL(null, '/word/save', [], true), 'method' => 'get', 'id' => 'word-add-form']) !!}<!-- Ссылка, куда отправить после нажатия на добавить-->
    <div class="form-group col-md-5 col-md-offset-7">
      {!! Form::label('word_russian', 'Слово на русском:') !!}
      {!! Form::text('word_russian', null, ['class'=>'form-control', 'maxlength' => 255,'required']) !!}
      {!! Form::label('word_english', 'Words in english:') !!}
      {!! Form::text('word_english', null, ['class'=>'form-control', 'maxlength' => 255,'required']) !!}
      {!! Form::label('word_estonian', 'Sõna eesti keeles:') !!}
      {!! Form::text('word_estonian', null, ['class'=>'form-control', 'maxlength' => 255,'required']) !!}
    </div>
    <div class="form-group col-md-8 col-md-offset-4">
    {!! Form::label('desc_russian', 'Описание на русском:') !!}
    {!! Form::textarea('desc_russian', null, ['class'=>'form-control','style'=>'height:100px','maxlength' => 255,'required']) !!}
    {!! Form::label('desc_english', 'Description in english:') !!}
    {!! Form::textarea('desc_english', null, ['class'=>'form-control','style'=>'height:100px','maxlength' => 255,'required']) !!}
    {!! Form::label('desc_estonian', 'Seletus eesti keeles:') !!}
    {!! Form::textarea('desc_estonian', null, ['class'=>'form-control','style'=>'height:100px', 'maxlength' => 255,'required']) !!}
    </div>
    <div class="form-group col-md-8 col-md-offset-4">
      {!! Form::label('image', 'Link:') !!}
      {!! Form::text('image', null, ['class'=>'form-control', 'maxlength' => 255]) !!}
    </div>
     <div class="form-group col-md-6 col-md-offset-3">     
     <select class="form-control" name="category" require>
        @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->$categoryName }}</option>
        @endforeach
      </select>
    </div> 
    <div class="form-group col-md-8 col-md-offset-4">
      {!! Form::submit(__('Add Word'), ['class'=>'btn btn-info form-control']) !!}
    </div>
  {!! Form::close() !!}
@endsection