@extends('layouts.layout')

@section('title','Editar información '.$user->name)

@section('content')

<form action="{{route('user.update', $user)}}" id="form_create_user" method="POST">
    @csrf
    @method('put')
    <div class="row">
      <div class="col-6">
        <label for="input-name" class="col-form-label">Nombre</label>
        <input name="name" class="form-control" id="input-name" type="text" value="{{ $user->name }}">
        <label for="input-identification" class="col-form-label">Número de identificación</label>
        <input name="identification" class="form-control" id="input-identification" type="text" value="{{$user->identification}}">
      </div>
      <div class="col-6">
        <label for="input-age" class="col-form-label">Edad</label>
        <input name="age" class="form-control" id="input-age" type="text" value="{{$user->age}}">
        <label for="input-email" class="col-form-label">Correo</label>
        <input name="email" class="form-control" id="input-email" type="text" value="{{$user->email}}">
      </div>
      <div class="ml-5 row">
        <div class="col-5">
          <label for="formSelect" class="col-form-label">Tipo de usuario</label>
          <select name="type_user" class="form-select" id="formSelect"> 
            @foreach ($types as $type)
              <option value="{{$type->id}}" {{ $user->type_user == $type->id ? 'selected' : '' }}>
                {{$type->type_user}}
              </option>
            @endforeach
          </select>
        </div>
        <div class="col-6">
            <label for="input-phone" class="col-form-label">Teléfono</label>
            <input name="phone" class="form-control" id="input-phone" type="text" value="{{$user->phone}}">
        </div>
      </div>
    </div>
    <div class="mt-4 pb-1 modal-footer">
      <a class="btn btn-primary" href="{{route('user.index')}}">Ir a usuarios</a>
      <button type="submit" class="btn btn-primary">Actualizar datos</button>
    </div>
</form>

@endsection