@extends('layouts.layout')

@section('title','Editar inmmueble')

@section('content')

<form action="{{route('property.update', $property)}}" id="form_create_property" method="POST">
    @csrf
    <input type="hidden" name="formulario_enviado" value="1">
    @method('put')
    <div class="row">
      <div class="col-4">
        <label for="select-propertiesType" class="col-form-label">Tipo de propiedad</label>
        <select name="propertiesType" class="form-select" id="select-propertiesType"> 
          <option>Seleccionar tipo de propiedad</option>
          <option value="Casa">Casa</option>
          <option value="Almacén">Almacén</option>
          <option value="Apartamento">Apartamento</option>
        </select>
      </div>
      <div class="col-4">
        <label for="input-zone" class="col-form-label">Zona</label>
        <input name="zone" class="form-control" id="input-zone" type="text" value="{{$property->zone}}">
      </div>
      <div class="col-4">
        <label for="input-address" class="col-form-label">Dirección</label>
        <input name="address" class="form-control" id="input-address" type="text" value="{{$property->address}}">
      </div>
      <div class="col-8">
        <label for="textarea-description" class="col-form-label">Descripción</label>
        <textarea name="description" class="form-control" id="textarea-description" cols="30" rows="5">{{$property->description}}</textarea>
      </div>
    </div>    
    <div class="mt-4 pb-1 modal-footer">
      <a class="btn btn-primary" href="{{route('property.index')}}">Ir a inmuebles</a>
      <button class="btn btn-primary">Actualizar datos</button>
    </div>
</form>

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

              if (opcion === "Seleccionar tipo de propiedad" || input_zone === "" || input_address === "" || text_area === "" || input_image === "") {
                  alert("Todos los campos deben estar llenos")
                  event.preventDefault(); // Evitar el envío del formulario
              }
              
          }
      });
  });
</script>