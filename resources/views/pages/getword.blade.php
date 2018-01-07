<!doctype html>
<?php $language = strtolower(LaravelLocalization::getCurrentLocaleName())?>
@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr><th>Words
            @if ( Auth::check() )            
                @if( Auth::user()->isAdmin())
                    <a class="nav-link proba" href="{{ LaravelLocalization::getLocalizedURL(null, '/description/add', [], true) }}">@lang('sidebar.add')</a>
                @endif
            @endif 
            </th></tr>
        </thead>
        <tbody>
            @foreach ($words as $w)
                <tr>
                    <td><a href="{{ LaravelLocalization::getLocalizedURL(null, 'category='.$category->id.'/word='.$w->id, [], true) }}"
                    class="list-group-item list-group-item-action">{{$w->$language}}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection