@extends('layouts.layout')

@section('title','Inmuebles')

@section('content')
   
    <h2 class="h2">Inmuebles</h2>
    
    <button type="button" class="btn btn-crear btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Registrar inmueble</button>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ingresar datos</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{route('property.store')}}" id="form_create_property" method="POST">
                <input type="hidden" name="formulario_enviado" value="1">
                @csrf
                <div class="row">
                  <div class="col-4">
                    <label for="select-propertiesType" class="col-form-label">Tipo de propiedad</label>
                    <select name="propertiesType" class="form-select" id="select-propertiesType"> 
                      <option value="">Seleccionar tipo de propiedad</option>
                      <option value="Casa">Casa</option>
                      <option value="Almacen">Almacén</option>
                      <option value="Apartamento">Apartamento</option>
                    </select>
                    @error('propertiesType')
                      <p class="text-danger">{{$message = '* El campo es requerido'}}</p>
                    @enderror
                  </div>
                  <div class="col-4">
                    <label for="input-zone" class="col-form-label">Zona</label>
                    <input name="zone" class="form-control" id="input-zone" type="text">
                    <div id="error_zone" class="mt-2 fs-6 text-danger d-none error">* El campo es requerido</div>
                    @error('zone')
                      <p class="text-danger">{{$message = '* El campo es requerido'}}</p>
                    @enderror
                  </div>
                  <div class="col-4">
                    <label for="input-address" class="col-form-label">Dirección</label>
                    <input name="address" class="form-control" id="input-address" type="text">
                    @error('address')
                    <p class="text-danger">{{$message = '* El campo es requerido'}}</p>
                    @enderror
                  </div>
                  <div class="col-4">
                    <label for="textarea-description" class="col-form-label">Descripción</label>
                    <textarea name="description" class="form-control" id="textarea-description" cols="30" rows="5"></textarea>
                    @error('description')
                    <p class="text-danger">{{$message = '* El campo es requerido'}}</p>
                    @enderror
                  </div>
                  <div class="col-4">
                    <label for="input-image" class="col-form-label">imágen</label>
                    <input type="file" name="propertyImage" id="input-image">
                    @error('zone')
                    <p class="text-danger">{{$message = '* El campo es requerido'}}</p>
                    @enderror
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
                        <th>Id del inmueble</th>
                        <th>Tipo de inmueble</th>
                        <th>Zona</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                   
                </thead>
        
                <tbody>
        
                    @foreach ($properties as $property)
        
                    <tr>
        
                        <td>{{$property->id}}</td>
                        <td>{{$property->propertiesType}}</td>
                        <td>{{$property->zone}}</td>
                        <td>{{$property->address}}</td>
                        <td>
                          <a href="{{route('property.show', $property->id)}}"><i class="fa-regular fa-eye"></i></a>
                          <a href="{{route('property.edit', $property->id)}}"><i class="fa-regular fa-pen-to-square"></i></a>
                          <a href="{{route('property.show', $property->id)}}"><i class="fa-regular fa-trash-can"></i></a>
                        </td>

                    </tr>
            
                    @endforeach
                    
                </tbody>
        
            </table>

        </div>
    
    </div>
    
@endsection

<script>
  document.addEventListener("DOMContentLoaded", function() {
      document.getElementById("form_create_property").addEventListener("submit", function(event) {
          // Verificar si el campo "formulario_enviado" tiene el valor "1"
          if (document.querySelector('input[name="formulario_enviado"]').value === "1") {
              // Validar otros campos aquí si es necesario
              let input_zone = document.querySelector("#input-zone").value;
              let opcion = document.querySelector('select[name="propertiesType"]').value;
              let input_address = document.querySelector("#input-address").value;
              let text_area = document.querySelector("#textarea-description").value;
              let input_image = document.querySelector("#input-image").value;

              if (opcion === "" || input_zone === "" || input_address === "" || text_area === "" || input_image === "") {
                  alert("Todos los campos deben estar llenos")
                  event.preventDefault(); // Evitar el envío del formulario
              }
              
          }
      });
  });
</script>

