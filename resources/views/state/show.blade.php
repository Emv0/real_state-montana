@extends('layouts.layout')

@section('title', 'Información inmueble ')
    
@section('content')
    
    <h2 class="h2">Descripción del inmueble</h2>
    <ol>
        <li class="mt-1 h5 list-group-item">Tipo de propiedad: {{$property->propertiesType}}</li>
        <li class="mt-1 h5 list-group-item">Zona: {{$property->zone}}</li>
        <li class="mt-1 h5 list-group-item">Descripción: {{$property->description}}</li>
        <li class="mt-1 h5 list-group-item">Dirección: {{$property->address}}</li>
        <li class="mt-1 h5 list-group-item">Imágen: 
            <hr> 
            <img style="height:300px " class="img-fluid" src="{{$property->propertyImage}}" alt="Imágen de la propiedad"></li>
    </ol>
    <div class="row d-flex justify-content-center">
        <div class="col-2">
            <a class="btn btn-primary" href="{{route('property.index')}}">Ir a inmuebles</a>
          </div>
        <div class="col-2">
            <a class="text-white text-decoration-none btn btn-primary" href="{{route('property.edit', $property->id)}}">Editar inmueble</a>
        </div>
        <form class="col-2" action="{{route('property.destroy', $property)}}" method="post">
            @method('delete')
            @csrf
            <button  class="btn btn-primary" type="submit">Eliminar inmueble</button>
        </form>
      </div>

@endsection