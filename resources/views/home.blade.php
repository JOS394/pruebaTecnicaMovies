@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
        <header class="header">
		<section class="hero-section">
			<div class="hero-mask">
			</div><!--//hero-mask-->
			<div class="container text-center py-5">
				<div class="single-col-max mx-auto">
					<div class="hero-heading-upper pt-3 mb-3">Encuentra la pelicula de deseas <br class="d-md-none"></div>
					<h1 class="hero-heading mb-5">
						<span class="brand mb-4 d-block"><span class="text-highlight pr-2"></span><span class="name">Movies!</span><span class="text-highlight pl-2"></span></span>
					    <span class="desc d-block">Compra o alquila la pelicula que desees</span>
				    </h1>
					<div class="text-center mb-5">
@if (auth()->user())	
						
            <a href="{{ route('registrado.home') }}" class="btn btn-success btn-lg scrollto">Buscar peliculas ahora</a>
            <br><br>
            @else
            
              
					</div>
                    <div class="text-center mb-5">
                    <a href="{{ route('login') }}" class="btn btn-success btn-lg scrollto">Ya tienes cuenta? acceder</a>
                    <a href="{{ route('register') }}" class="btn btn-info btn-lg scrollto">Registrarse ahora</a>
					</div>
          @endif 					
					<div class="hero-summary">
						<div class="row">
							<div class="item col-4">
								<div class="summary-desc mb-1"><i class="icon fas fa-video me-2"></i>Contenido</div>
								<h4 class="summary-heading">80+ <span class="desc">Peliculas</span></h4>
								
							</div><!--//col-->
							<div class="item col-4">
								<div class="summary-desc mb-1"><i class="icon fas fa-clock me-2"></i>Entretenimiento</div>
								<h4 class="summary-heading">+999 <span class="desc">ilimitado</span></h4>
								
							</div><!--//col-->
							<div class="item col-4">
								<div class="summary-desc mb-1"><i class="icon fas fa-user-circle me-2"></i>Acceso</div>
                <h4 class="summary-heading">Registrate gratis!</h4>
								
							</div><!--//col-->
						</div><!--//row-->
					</div><!--//hero-summary-->
				</div><!--//single-col-max-->
			</div><!--//container-->
			
		</section><!--//hero-section-->
	</header><!--//header-->
	
            <div class="card">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/carrousel/slide2.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/carrousel/slide3.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/carrousel/slide1.jpg') }}" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
           
            
            <!-- <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div> -->





        </div>
    </div>
</div>
@endsection
