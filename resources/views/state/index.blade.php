@extends('layouts.layout')

@section('title','Inmuebles')

@section('content')
   
    <h2 class="h2">Inmuebles</h2>
    
    <a class="mb-3 btn btn-primary mt-3" href="#">Crear usuario</a>

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
                        <td><a href="{{route('property.show', $property->id)}}"><i class="fa-regular fa-eye"></i></a></td>
        
                    </tr>
            
                    @endforeach
                    
                </tbody>
        
            </table>

        </div>
    
    </div>
    
@endsection

