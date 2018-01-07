<!doctype html>
<?php $language = strtolower(LaravelLocalization::getCurrentLocaleName());?>
@extends('layouts.app')

@section('content')
    <p>{{$word->$language}}   
        @if ( Auth::check() )
            @if ( !Auth::user()->wordIsExistInGlossary($description->id) )
                <a href="{{ LaravelLocalization::getLocalizedURL(null, 'glossary/add/word/id='.$word->id, [], true) }}"><span>+</span></a>
            @else
                <a href="{{ LaravelLocalization::getLocalizedURL(null, 'glossary/delete/word/id='.$word->id, [], true) }}"><span>-</span></a> 
            @endif
            @if( Auth::user()->isAdmin())
                <a class="nav-link proba" href="{{ LaravelLocalization::getLocalizedURL(null, '/description/edit/id='.$description[0]->id, [], true) }}">@lang('sidebar.edit')</a>
            @endif
       @endif        
    </p>
    @if($description->image)<img src="{{$description->image}}" class="thumb" alt="a picture">
    @endif
    
    <p>{{$description->$language}}</p>
@endsection