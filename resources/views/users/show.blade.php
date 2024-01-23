@extends('layouts.layout')

@section('title','Información '. $user->name)

@section('content')

    <h2 class="text-black h2">Descripción del usuario</h2>

    <ul class="mt-4 list-group">
        <li class="mt-1 h5 list-group-item">id: {{$user->identification}}</li>
        <li class="mt-1 h5 list-group-item">Usuario: {{$type->type_user}}</li>
        <li class="mt-1 h5 list-group-item">Nombre: {{$user->name}}</li>
        <li class="mt-1 h5 list-group-item">Edad: {{$user->age}}</li>
        <li class="mt-1 h5 list-group-item">Teléfono: {{$user->phone}}</li>
        <li class="mt-1 h5 list-group-item">Correo: {{$user->email}}</li>
      </ul>
      <div class="row mt-4 d-flex justify-content-center">
        <div class="col-2">
          <a class="btn btn-primary" href="{{route('user.index')}}">Ir a usuarios</a>
        </div>
        <div class="col-2">
          <a class="text-white text-decoration-none btn btn-primary" href="{{route('user.edit', $user->id)}}">Editar usuario</a>
        </div>
        <form class="col-2" action="{{route('user.destroy', $user)}}" method="post">
          @method('delete')
          @csrf
          <button  class="btn btn-primary" type="submit">Eliminar usuario</button>
        </form>
      </div>
@endsection