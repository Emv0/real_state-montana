@extends('layouts.layout')

@section('title','Información '.$user->name)

@section('content')

    <h2 class="text-black h2">Descripción del usuario</h2>

    <ul class="mt-4 list-group">
        <li class="mt-1 h5 list-group-item">id: {{$user->id}}</li>
        <li class="mt-1 h5 list-group-item">Usuario: {{$user->type_user}}</li>
        <li class="mt-1 h5 list-group-item">Nombre: {{$user->name}}</li>
        <li class="mt-1 h5 list-group-item">Edad: {{$user->age}}</li>
        <li class="mt-1 h5 list-group-item">Teléfono: {{$user->number}}</li>
        <li class="mt-1 h5 list-group-item">Correo: {{$user->email}}</li>
      </ul>

@endsection