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
      <form action="{{url('/movies')}}" method="POST" enctype="multipart/form-data" class="formulario-agregar" name="form1">
        @csrf
        <div class="form-group">
          <label for="name_movie">{{'Titulo de la pelicula'}}</label>
      
            <input type="text" class="form-control" id="name_movie" name="name_movie" aria-describedby="name_movie" placeholder="Titulo de la pelicula" required value="{{ old('name_movie') }}">
  
          </div>
          <br>  
         <div class="form-row mx-auto">
          <div class="form-group ">
          <label for="category">{{'Genero de la pelicula'}}</label>
      
          <select name="category"  id="category" class="form-control"  value="{{ old('category') }}" required autocomplete="category" autofocus>
              <option selected value="">Genero de la pelicula </option>  
              <option value="{{ __('Acción') }}" {{ old('category') == 1 ? 'selected' : '' }}>Acción</option>
                <option value="{{ __('Aventuras') }}" {{ old('category') == 2 ? 'selected' : '' }}>Aventuras</option>
                <option value="{{ __('Ciencia Ficción') }}" {{ old('category') == 3 ? 'selected' : '' }}>Ciencia Ficción</option>
                <option value="{{ __('Comedia') }}" {{ old('category') == 1 ? 'selected' : '' }}>Comedia</option>
                <option value="{{ __('No Ficción') }}" {{ old('category') == 2 ? 'selected' : '' }}>No Ficción</option>
                <option value="{{ __('Drama') }}" {{ old('category') == 3 ? 'selected' : '' }}>Drama</option>
                <option value="{{ __('Fantasía') }}" {{ old('category') == 2 ? 'selected' : '' }}>Fantasía</option>
                <option value="{{ __('Musical') }}" {{ old('category') == 3 ? 'selected' : '' }}>Musical</option>
                <option value="{{ __('Suspenso') }}" {{ old('category') == 1 ? 'selected' : '' }}>Suspenso</option>
                <option value="{{ __('Terror') }}" {{ old('category') == 2 ? 'selected' : '' }}>Terror</option>

</select>
          </div>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="form-group mx-4">
          <label for="status">{{'Disponibilidad de la pelicula'}}</label>
      
          <select name="status"  id="status" class="form-control"  value="{{ old('status') }}" required autocomplete="status" autofocus>
              <option selected value="">Disponibilidad de la pelicula</option>  
              <option value="{{ __('Disponible') }}" {{ old('status') == 1 ? 'selected' : '' }}>Disponible</option>
              <option value="{{ __('No disponible') }}" {{ old('status') == 1 ? 'selected' : '' }}>No disponible</option>

</select>

          </div> 
          <br>   <br>  
          <div class="form-group py-4 ">
            
          <label for="price_sale">{{'Precio de la pelicula'}}</label>
      
            <input type="number" class="form-control" id="price_sale" name="price_sale" aria-describedby="price_sale" placeholder="precio de la pelicula" required value="{{ old('name_movie') }}">
  
          </div>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="form-group py-4 ">
            <label for="release_year">{{'Año de estreno'}}</label>
      
            <!-- <input type="text" class="form-control" id="release_year" name="release_year" aria-describedby="release_year" placeholder="año de la pelicula" required value="{{ old('name_movie') }}"> -->
            <select name="release_year"  id="release_year" class="form-control"  value="{{ old('release_year') }}" required autocomplete="release_year" autofocus>
                      <option value="0">Año</option>
                      <?php  for($i=1930;$i<=2021;$i++) { echo "<option value='".$i."'>".$i."</option>"; } ?>
                    </select>

          </div>
        </div>
         
          <div class="form-group">
            <label for="synopsis">{{'Sinopsis'}}</label>
            <textarea class="form-control" id="synopsis" name="synopsis" rows="2" placeholder="sinopsis de la pelicula" required min='3'>{{  old('synopsis') }}</textarea>
              
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
