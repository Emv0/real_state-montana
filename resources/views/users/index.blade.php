@extends('layouts.layout')

@section('title','Usuarios')
    
@section('content')

    <h2>Usuarios</H2>
        <ul>
            @foreach ($users as $user)
               <li>{{$user->name}}</li> 
            @endforeach
        </ul>
        {{$users->links()}}
@endsection