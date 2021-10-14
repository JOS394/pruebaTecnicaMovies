@extends('layouts.app')
@section('content')
@if (Auth::user()->hasRole('Administrador')) 
<div class="container-fluid">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css"/>
    <div class="card">
    <div class="card-body">
      {{-- barra de busqueda --}}
      <div class="card-header">
        <h4 class="card-title">Listado de peliculas</h4>  </div>

      <table class="table table-striped display nowrap" id="movies">
        <ul class="nav nav-pills card-header-pills">
          <li class="nav-item">
            <br>
            <a id="agregar1" class="btn btn-primary" href="{{url('/movies/create')}}" type="submit" data-toggle="tooltip" data-html="true" title="Crear nueva categoria" >Agregar nueva pelicula</a>
          </li>
    <li> &nbsp;  &nbsp; </li>

        </ul>
        <br>
        <thead class="thead">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre de la pelicula</th>
                <th scope="col">Disponibilidad</th>
                <th scope="col">category</th>
                <th scope="col">sinopsis</th>
                <th scope="col">año de estreno </th>
                <th scope="col">Precio de Venta</th>
                <th scope="col">Gestion</th>
            </tr>
        </thead>
    
        <tbody>
            @foreach ($movies as $movie)     
            <tr>
                <td scope="row">{{$loop->iteration}}</td>        
                <td scope="row">{{$movie->name_movie}}</td>
                <td scope="row">{{$movie->status}}</td>
                <td scope="row">{{$movie->category}}</td>
                <td scope="row">{{$movie->synopsis}}</td>
                <td scope="row">{{$movie->release_year}}</td>
                <td scope="row">${{$movie->price_sale}}</td>
                <td scope="row">
                @if (Auth::user()->hasPermissionTo('editar pelicula')) 
                        <a  class='btn btn-success' href="{{ url('/movies/'.$movie->id.'/edit')}}" data-toggle="tooltip" data-html="true" title="Editar pelicula" ><i class="fas fa-edit"></i></a>
                  @endif
                        <br>
                    <br>
                    @if (Auth::user()->hasPermissionTo('eliminar pelicula')) 
                    <form action="{{url ('/movies/'.$movie->id)}}" method="post" class="formulario-eliminar">
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

  </div>
    </div>
  </div>
 
  
      <script>

$(document).ready(function() {
    $('#movies').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
  </script>






@else
<div class="container">

  <!-- Inner -->
  <div class="carousel-inner py-4">
    <!-- Single item -->
    <div class="carousel-item active">
      <div class="container">
      
        <div class="row">
          @foreach ($movies as $movie) 
        
          <div class="col-lg-3 d-none d-lg-block py-3">
            <div class="card">
            <center>
              <br><br>
            <h5 class="card-title"><b>Titulo de la pelicula:</b>&nbsp;&nbsp;{{$movie->name_movie}}</h5>
              <img
                src="{{ asset('images/panel/movie.jpg') }}"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
             
                <p class="card-text">
                <b>Disponibilidad:</b> {{$movie->status}}
                </p>
                <p class="card-text">
                <b>Genero:</b>{{$movie->category}}
                </p>
             
                   <p class="card-text">
                   <b>Año de estreno:</b>  {{$movie->release_year}}
                </p>
                <p class="card-text">
                <b>Precio de venta:</b>  ${{$movie->price_sale}}
                </p>
                <p class="text-card">
               <b>Sinopsis:</b> {{$movie->synopsis}}
                </p>
                <center>
                <a href="#!" class="btn btn-primary btn-lg">Comprar</a><br><br>
                <a href="#!" class="btn btn-warning btn-lg">Alquilar</a>
              </center>
              </div>
            </div>
            <center>
          </div>
          <br><br>
     
    @endforeach
    
  <!-- Inner -->
</div>
<!-- Carousel wrapper -->   

</div>
@endif
  @endsection