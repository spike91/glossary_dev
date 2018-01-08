<!doctype html>
@extends('layouts.app')

@section('content')

    <table border="1" cellpadding="10">
        <thead>
            <tr>
            <th>Name</th>
            <th>E-mail</th>
            <th>Registration date</th>
            <th>Is Admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->created_at}}</td>
                    <td>{{$u->isadmin}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection