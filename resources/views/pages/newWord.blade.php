@extends('layouts.app')

@section('content')
<H3 align="center">New word</H3>
<hr/>
   {!! Form::open(['url'=>'']) !!}<!--надо дописать url -->
    <div class="form-group col-md-6 col-md-offset-3">
      {!! Form::label('word', 'Word:') !!}
      {!! Form::text('word', null, ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="form-group col-md-6 col-md-offset-3">
      {!! Form::label('description', 'Description:') !!}
      {!! Form::textarea('description', null, ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="form-group col-md-6 col-md-offset-3">
      {!!Form::select('id_category', $categories_array, ['class'=>'form-control', 'required']) !!}
    </div>
    <div class="form-group col-md-6 col-md-offset-3">
      {!! Form::submit('Add word', ['class'=>'btn btn-info form-control', 'required']) !!}
    </div>
  {!! Form::close() !!}
@endsection