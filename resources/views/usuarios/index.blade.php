@extends('layouts.app')
@section('content')
@if(Auth::user())
@if (Auth::user()->hasRole('Administrador')) 
<div class="container-fluid">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"/>
    <div class="card">
    <div class="card-body">
      {{-- barra de busqueda --}}
      <div class="card-header">
        <h4 class="card-title">Listado de usuarios</h4>  </div>
      <table class="table table-striped" id="users">
        <ul class="nav nav-pills card-header-pills">
          <li class="nav-item">
            <br>
            <a id="agregar1" class="btn btn-primary" href="{{url('/users/create')}}" type="submit" data-toggle="tooltip" data-html="true" title="Crear nuevo usuario" >Agregar nuevo usuario</a>
          </li>
    <li> &nbsp;  &nbsp; </li>

        </ul>
        <br>
        <thead class="thead">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre de la Usuario</th>
                <th scope="col">Correo Electronico</th>
                <th scope="col">Tipo de usuario</th>
                <th scope="col">Gestion</th>
            </tr>
        </thead>
    
        <tbody>
            @foreach ($users as $user)     
            <tr>
                <td scope="row">{{$loop->iteration}}</td>        
                <td scope="row">{{$user->name}}</td>
                <td scope="row">{{$user->email}}</td>
                <td scope="row">
                @if ($user->type_user=='1'){{'Administrador'}}@endif
                    @if ($user->type_user=='0'){{'Usuario registrado'}}@endif

                </td>
                <td scope="row">
                  <br>
                @if (Auth::user()->hasPermissionTo('editar usuario')) 
                        <a  class='btn btn-success' href="{{ url('/users/'.$user->id.'/edit')}}" data-toggle="tooltip" data-html="true" title="Editar pelicula" ><i class="fas fa-edit"></i></a>
                  @endif
                        <br>
                    <br>
                    @if (Auth::user()->hasPermissionTo('eliminar usuario')) 
                    <form action="{{url ('/users/'.$user->id)}}" method="post" class="formulario-eliminar">
                    @csrf
                    {{method_field('DELETE')}}
                    <button  class='btn btn-danger ' type="submit"  data-toggle="tooltip" data-html="true" title="Eliminar pelicula" ><i class="far fa-trash-alt"></i></button></form>
                @endif        
    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('sweetalert2/sweetalert2.min.js') }}"> -->

<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>

  </div>
    </div>
  </div>
 
  
      <script>

$(document).ready(function() {
    $('#users').DataTable( {
      fixedColumns: true,
    responsive:true,
    autoWidth:true,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
  </script>



@endif


@else
  
    <div class="container-fluid py-5 ">
    <div class="card">

      </div>
      <div class="card-body">
        <center><img src="{{ asset('images/error/404.jpg') }}" alt=""></center>
        <center>
        <h6 class="card-title">Pagina no encontrada</h6>
        
        <a href="{{url('home')}}" class="btn btn-primary">Regresar a la pantalla de inicio</a>
      </center>
      </div>
    </div>
    </div>
      </div>
    </div>
    @endif
    
@endsection
