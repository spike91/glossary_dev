<!doctype html>
<?php $language = strtolower(LaravelLocalization::getCurrentLocaleName());
$categoryLanguage = $language.'_category';
?>
@extends('layouts.app')

@section('content')
<h4>@lang('sidebar.glossary')</h4>
<hr/>
    <table>
        <thead>
            <tr><th></th></tr>
        </thead>
        <tbody>
            @foreach ($words as $w)
                <tr>
                    <td><a href="{{ LaravelLocalization::getLocalizedURL(null, 'category='.$w->id_category.'/word='.$w->id, [], true) }}"
                    class="list-group-item list-group-item-action">{{$w->$language}} ( {{($w->$categoryLanguage) }})</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection