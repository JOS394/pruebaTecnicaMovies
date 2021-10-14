<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
           
            $table->id();
            $table->string('name_movie')->unique();
            $table->string('category');//categoria
            $table->string('status');//estado de la pelicula;disponible/no disponible
            $table->string('synopsis');//sinopsis pelicula
            $table->year('release_year')->nullable();//año de estreno
            $table->double('price_sale')->nullable();//precio de alquiler
            $table->double('price_rental')->nullable();//precio de alquiler
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
