<!doctype html>
@extends('layouts.app')

@section('content')
    <p> This is dashboard.</p>

    <table>
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
                    <td>{{$u->create_at}}</td>
                    <td>{{$u->isadmin}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection