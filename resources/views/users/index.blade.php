@extends('layouts.layout')

@section('title','Usuarios')

@section('content')

    <h2 class="h2">Usuarios</H2>

    <button type="button" class="btn btn-crear btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Crear usuario</button>
    <a class="btn btn-primary mt-3 mb-3" href="{{ route('dating.create') }}">Agendar</a>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ingresar datos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{route('user.store')}}" id="form_create_user" method="POST">
              <input type="hidden" name="formulario_enviado" value="1">
              @csrf
              <div class="row">
                <div class="col-4">
                  <label for="input-name" class="col-form-label">Nombre</label>
                  <input name="name" class="form-control" id="input-name" type="text">
                </div>
                <div class="col-4">
                  <label for="input-identification" class="col-form-label">Número de identificación</label>
                  <input name="identification" class="form-control" id="input-identification" type="text">
                </div>
                <div class="col-4">
                  <label for="input-age" class="col-form-label">Edad</label>
                  <input name="age" class="form-control" id="input-age" type="text">
                </div>
                <div class="col-4">
                  <label for="input-email" class="col-form-label">Correo</label>
                  <input name="email" class="form-control" id="input-email" type="text">
                </div>
                <div class="col-4">
                  <label for="formSelect" class="col-form-label">Tipo de usuario</label>
                  <select name="type_user" class="form-select" name="type_user" id="formSelect"> 
                    <option>Seleccionar Usuario</option>
                    @foreach ($types as $type)
                      <option value="{{ $type->id }}">{{ $type->type_user }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-4">
                  <label for="input-phone" class="col-form-label">Teléfono</label>
                  <input name="phone" class="form-control" id="input-phone" type="text">
                </div>
              </div>
              <div class="mt-4 pb-1 modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary">Guardar datos</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <table id="tables" class="table table-striped " style="width:100%">
                <thead>
                    <tr>
                        <th>Número de identificación</th>
                        <th>Tipo de usuario</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="text-black text-decoration-none">  {{ $user->identification }} </td>     
                        <td class="text-black text-decoration-none">  {{ $user->type_user }}</a></td>
                        <td class="text-black text-decoration-none">  {{ $user->name }}</a></td>
                        <td class="text-black text-decoration-none">  {{ $user->email }}</a></td>
                        <td class="text-black text-decoration-none">  {{ $user->phone }}</a></td>
                        <td>
                        
                          <a href="{{route('user.show', $user->id)}}"><i class="fa-regular fa-eye"></i></a>
                          <a href="{{route('user.edit', $user->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
                          <a href="{{route('user.show', $user->id)}}"><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    
@endsection

