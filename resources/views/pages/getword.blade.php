<!doctype html>
<?php $language = strtolower(LaravelLocalization::getCurrentLocaleName())?>
@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr><th>Word</th></tr>
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