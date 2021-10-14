@extends('layouts.app')

@section('content')
@if (Auth::user()->hasRole('Administrador')) 
<div class="container py-5">
  
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header py-4">
                    <h2 class="text-center">Creacion de categorias</h2>
                </div>
                <div class="card-body">
                    
                  
              @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                <ul>
                    @error('name_movie')
                    <li>
                   {{ $errors->first('name_movie') }}
                  </li>
                    @enderror
              
                    @error('category')
                    <li>
                   {{ $errors->first('category') }}
                  </li>
                    @enderror

                    @error('status')
                    <li>
                   {{ $errors->first('status') }}
                  </li>
                    @enderror

                    @error('synopsis')
                    <li>
                   {{ $errors->first('synopsis') }}
                  </li>
                    @enderror

                    @error('release_year')
                    <li>
                   {{ $errors->first('release_year') }}
                  </li>
                    @enderror
                    
                </ul>
              
              </div> 
              @endif
                    <div style="text-align: center;">
                    <p></p>
                </div>
                
<div class="form-label-group mb-6">
      <form action="{{url('/movies/'.$movie->id)}}" method="POST" enctype="multipart/form-data" class="formulario-agregar" name="form1">
      @csrf
            @method('PATCH')
        <div class="form-group">
          <label for="name_movie">{{'Titulo de la pelicula'}}</label>
      
            <input type="text" class="form-control" id="name_movie" name="name_movie" aria-describedby="name_movie" placeholder="Titulo de la pelicula" required value="{{$movie->name_movie}}">
  
          </div>
          <br>  
         <div class="form-row mx-auto">
          <div class="form-group ">
          <label for="category">{{'Genero de la pelicula'}}</label>
      
          <select name="category"  id="category" class="form-control"  value="{{$movie->category}}" required autocomplete="category" autofocus>
              <option {{ $movie->category == "" ? 'selected' : '' }} value="">Genero de la pelicula </option>  
              <option {{ $movie->category == "Acción" ? 'selected' : '' }} value="{{ __('Acción') }}">Acción</option>
                <option {{ $movie->category == "Aventuras" ? 'selected' : '' }} value="{{ __('Aventuras') }}">Aventuras</option>
                <option {{ $movie->category == "Ciencia Ficción" ? 'selected' : '' }} value="{{ __('Ciencia Ficción') }}">Ciencia Ficción</option>
                <option {{ $movie->category == "Comedia" ? 'selected' : '' }} value="{{ __('Comedia') }}">Comedia</option>
                <option {{ $movie->category == "No Ficción" ? 'selected' : '' }} value="{{ __('No Ficción') }}">No Ficción</option>
                <option {{ $movie->category == "Drama" ? 'selected' : '' }} value="{{ __('Drama') }}">Drama</option>
                <option {{ $movie->category == "Fantasía" ? 'selected' : '' }} value="{{ __('Fantasía') }}">Fantasía</option>
                <option {{ $movie->category == "Musical" ? 'selected' : '' }} value="{{ __('Musical') }}">Musical</option>
                <option {{ $movie->category == "Suspenso" ? 'selected' : '' }} value="{{ __('Suspenso') }}">Suspenso</option>
                <option {{ $movie->category == "Terror" ? 'selected' : '' }} value="{{ __('Terror') }}">Terror</option>

</select>
          </div>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="form-group mx-4">
          <label for="status">{{'Disponibilidad de la pelicula'}}</label>
      
          <select name="status"  id="status" class="form-control"  value="{{ old('status') }}" required autocomplete="status" autofocus>
              <option selected value="">Disponibilidad de la pelicula</option>  
              <option {{ $movie->status == "Disponible" ? 'selected' : '' }} value="{{ __('Disponible') }}">Disponible</option>
              <option {{ $movie->status == "No disponible" ? 'selected' : '' }} value="{{ __('No disponible') }}">No disponible</option>

</select>

          </div> 
          <br>   <br>  
          <div class="form-group py-4 ">
            
          <label for="price_sale">{{'Precio de la pelicula'}}</label>
      
            <input type="number" class="form-control" id="price_sale" name="price_sale" aria-describedby="price_sale" placeholder="precio de la pelicula" required value="{{$movie->price_sale}}">
  
          </div>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="form-group py-4 ">
            <label for="release_year">{{'Año de estreno'}}</label>
      
            <!-- <input type="text" class="form-control" id="release_year" name="release_year" aria-describedby="release_year" placeholder="año de la pelicula" required value="{{ old('name_movie') }}"> -->
            <select name="release_year"  id="release_year" class="form-control"  value="{{$movie->release_year}}" required autocomplete="release_year" autofocus>
                      <option value="{{$movie->release_year}}">{{$movie->release_year}}</option>
                      <?php  for($i=1930;$i<=2021;$i++) { echo "<option value='".$i."'>".$i."</option>"; } ?>
                    </select>

          </div>
        </div>
         
          <div class="form-group">
            <label for="synopsis">{{'Sinopsis'}}</label>
            <textarea class="form-control" id="synopsis" name="synopsis" rows="2" placeholder="sinopsis de la pelicula" required min='3'>{{$movie->synopsis}}</textarea>
              
          </div>
    
            
          </div>

          <div class="form-group label-floating">

        </div>
            <br>
           <input type="submit" class="btn btn-success btn-lg btn-block mb-4" id="crear" type="submit" value="Agregar">
                </div>
            </form>
            </div>
        </div>
    </div>
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
