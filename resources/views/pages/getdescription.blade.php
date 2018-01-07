<!doctype html>
<?php $language = strtolower(LaravelLocalization::getCurrentLocaleName());?>
@extends('layouts.app')

@section('content')
<p><b>{{$word->$language}}</b>&nbsp;&nbsp;<a href="#"><span>+</span></a></p>
<p>{{$description[0]->$language}}</p>
@endsection