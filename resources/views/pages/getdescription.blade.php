<!doctype html>
<?php $language = strtolower(LaravelLocalization::getCurrentLocaleName());?>
@extends('layouts.app')

@section('content')
    <p>{{$word->$language}}   
        @if ( Auth::check() )
            @if ( !Auth::user()->wordIsExistInGlossary($description[0]->id) )
                <a href="{{ LaravelLocalization::getLocalizedURL(null, 'glossary/add/word/id='.$word->id, [], true) }}"><img src="/images/pluss.png" width="20" alt="picture"></a>
            @else
                <a href="{{ LaravelLocalization::getLocalizedURL(null, 'glossary/delete/word/id='.$word->id, [], true) }}"><img src="/images/minus.png" width="20" alt="picture"></a> 
            @endif
            @if( Auth::user()->isAdmin())
                <a class="nav-link proba" href="{{ LaravelLocalization::getLocalizedURL(null, '/description/edit/id='.$description[0]->id, [], true) }}">@lang('sidebar.edit')</a>
            @endif
       @endif        
    </p>
    <p>{{$description[0]->$language}}</p>
@endsection