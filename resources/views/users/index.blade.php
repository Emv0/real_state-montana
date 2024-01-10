@extends('layouts.layout')

@section('title','Usuarios')

@section('css')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

@endsection

@section('content')

    <h2 class="h2">Usuarios</H2>

    <a class="btn btn-primary mt-3" href="{{route('user.create')}}">Crear usuario</a>
    <div class="card dark card mt-3">
        <div class="card-body">

            <table id="users" class="table table-striped " style="width:100%">
                <thead>
    
                    <tr>
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
                        <td class="text-black text-decoration-none">  {{ $user->type_user }}</a></td>                
                        <td class="text-black text-decoration-none">  {{ $user->name }}</a></td>
                        <td class="text-black text-decoration-none">  {{ $user->email }}</a></td>
                        <td class="text-black text-decoration-none">  {{ $user->number }}</a></td>
                        <td><a href="{{route('user.show',$user->id)}}"><i class="fa-regular fa-eye"></i></a></td>
                    </tr>
    
                    @endforeach
         
                </tbody>
            </table>
    
        </div>
    </div>
    


@endsection

@section('js')

        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

        <script>

            	$('#users').DataTable({
                    
                    responsive: true,
                    autoWidth:false,

                    "language": {
                        "lengthMenu": "Mostrar _MENU_ datos por página",
                        "zeroRecords": "No encontrado",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)",
                        "search": "Buscar:",
                        "paginate":{
                            "next":"Siguiente",
                            "previous":"Anterior"
                        }
                    }
                
                })

 
        </script>

@endsection