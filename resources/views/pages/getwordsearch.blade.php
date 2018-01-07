<!doctype html>
<?php $language = strtolower(LaravelLocalization::getCurrentLocaleName());
$categoryLanguage = 'category'.$language;
?>
@extends('layouts.app')

@section('content')
    <table>
        <thead>
            <tr><th>Word</th></tr>
        </thead>
        <tbody>
            @foreach ($words as $w)
                <tr>
                    <td><a href="{{ LaravelLocalization::getLocalizedURL(null, 'word/'.$w->id.'/'.$w->categoryID, [], true) }}"
                    class="list-group-item list-group-item-action">{{$w->$language}} ({{$w->categoryLanguage}})</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection