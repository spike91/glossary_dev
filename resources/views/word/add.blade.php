@extends('layouts.app')
<?php $categoryName = strtolower(LaravelLocalization::getCurrentLocaleName())?>
@section('content')
<H3 align="center">{{ $description==null ? __('sidebar.new'):__('Editing Word')}}</H3>
<hr/>
{!! Form::open(['url'=> LaravelLocalization::getLocalizedURL(null, $description==null ? '/word/save':'/word/update', [], true), 'method' => 'get', 'id' => 'word-add-form']) !!}
    <div class="form-group col-md-5 col-md-offset-7">
    {{ Form::hidden('wordId', $word==null ? null:$word->id) }}
      {!! Form::label('word_russian', 'Слово на русском:') !!}
      {!! Form::text('word_russian', $word==null ? null:$word->russian, ['class'=>'form-control', 'maxlength' => 60,'required']) !!}
      {!! Form::label('word_english', 'Words in english:') !!}
      {!! Form::text('word_english', $word==null ? null:$word->english, ['class'=>'form-control', 'maxlength' => 60,'required']) !!}
      {!! Form::label('word_estonian', 'Sõna eesti keeles:') !!}
      {!! Form::text('word_estonian', $word==null ? null:$word->estonian, ['class'=>'form-control', 'maxlength' => 60,'required']) !!}
    </div>
    <div class="form-group col-md-8 col-md-offset-4">
    {{ Form::hidden('descId', $description==null ? null:$description->id) }}
    {!! Form::label('desc_russian', 'Описание на русском:') !!}
    {!! Form::textarea('desc_russian', $description==null ? null:$description->russian, ['class'=>'form-control','style'=>'height:100px','maxlength' => 255,'required']) !!}
    {!! Form::label('desc_english', 'Description in english:') !!}
    {!! Form::textarea('desc_english', $description==null ? null:$description->english, ['class'=>'form-control','style'=>'height:100px','maxlength' => 255,'required']) !!}
    {!! Form::label('desc_estonian', 'Seletus eesti keeles:') !!}
    {!! Form::textarea('desc_estonian', $description==null ? null:$description->estonian, ['class'=>'form-control','style'=>'height:100px', 'maxlength' => 255,'required']) !!}
    </div>
    <div class="form-group col-md-8 col-md-offset-4">
      {!! Form::label('image', 'Link:') !!}
      {!! Form::text('image', $description==null ? null:$description->image, ['class'=>'form-control', 'maxlength' => 255]) !!}
    </div>
     <div class="form-group col-md-6 col-md-offset-3">     
     <select class="form-control" name="category" require> 
          <?php $category_fk = $description==null ? null:$description->category_fk ?>    
        @foreach($categories as $category)
          @if($category->id == $category_fk)
          <option value="{{ $category->id }}" selected>{{ $category->$categoryName }}</option>
          @else
            <option value="{{ $category->id }}">{{ $category->$categoryName }}</option>
          @endif        
        @endforeach
      </select>
    </div> 
    <div class="form-group col-md-8 col-md-offset-4">
      {!! Form::submit($description==null ? __('Add Word'):__('Edit Word'), ['class'=>'btn btn-info form-control']) !!}
    </div>
  {!! Form::close() !!}
@endsection