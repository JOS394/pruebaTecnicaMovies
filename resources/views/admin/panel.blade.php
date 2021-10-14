@extends('layouts.app')

@section('content')
@if (Auth::user()->hasRole('Administrador')) 
<div class="container">

<!-- Carousel wrapper -->
<div
  id="carouselMultiItemExample"
  class="carousel slide carousel-dark text-center"
  data-mdb-ride="carousel"
>
    </div>
  <!-- Inner --><center>
  <div class="carousel-inner py-4">
    <!-- Single item -->
    <div class="carousel-item active">
      <div class="container">
        <div class="row">
        <div class="col-lg-3"></div>  
          <div class="col-lg-3">
            <div class="card">
              <img
                src="{{ asset('images/panel/user.png') }}"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
             <center> <a href="{{ route('users.index') }}" class="btn btn-primary btn-lg">Gestionar usuarios</a></center>
             <br>
                <h5 class="card-title">Usuarios</h5>
                <p class="card-text">
                  Modulo de Gestion de usuarios en el cual se puede editar, eliminar y agregar nuevos usuarios.
                </p>
               
              </div>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="card">
              <img
              src="{{ asset('images/panel/movies.jpg') }}"
                class="card-img-top"
                alt="..."
              />
              <div class="col-lg-3"></div>
              <div class="card-body">
               <a href="{{ route('movies.index') }}" class="btn btn-primary btn-lg">Gestionar peliculas</a>
              <br>
              <br>
                <h5 class="card-title">Peliculas </h5>
                <p class="card-text">
                Modulo de Gestion de peliculas en el cual se puede editar, eliminar y agregar nuevos peliculas.
                </p>

              </div>
            </div>
          </div>

         
    
      </center>
    </div>

        </div>
      </div>
    </div>

 
  <!-- Inner -->
</div>
<!-- Carousel wrapper -->   

</div>
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
