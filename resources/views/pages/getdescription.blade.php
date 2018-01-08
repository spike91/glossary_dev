<!doctype html>
<?php $language = strtolower(LaravelLocalization::getCurrentLocaleName());?>
<?php $categoryName = strtolower(LaravelLocalization::getCurrentLocaleName())?>
@extends('layouts.app')

@section('content')
<h4>{{$category->$categoryName}}</h4>
<hr/>
    <h3>
    {{$word->$language}}
        @if ( Auth::check() )
            @if ( !Auth::user()->wordIsExistInGlossary($description->id) )
                <a href="{{ LaravelLocalization::getLocalizedURL(null, 'glossary/add/word/id='.$word->id, [], true) }}"><span>+</span></a>
            @else
                <a href="{{ LaravelLocalization::getLocalizedURL(null, 'glossary/delete/word/id='.$word->id, [], true) }}"><span2>-</span2></a> 
            @endif
            @if( Auth::user()->isAdmin())
            <b>&nbsp;&nbsp;&nbsp;
            <a href="{{ LaravelLocalization::getLocalizedURL(null, '/description/edit/id='.$description->id, [], true) }}" style="color: #0A0237">@lang('sidebar.edit')</a>
            </b>
                @endif
       @endif        
</h3>
    @if($description->image)<img src="{{$description->image}}" class="thumb" alt="a picture">
    @endif
    
    <p>{{$description->$language}}</p>
@endsection