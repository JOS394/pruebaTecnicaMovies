<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
          
            $table->id();
            $table->string('type_movement');//tipo movimiento
            $table->string('deadline');//fecha Limite
            $table->string('date_movement');//fecha de movimiento
            $table->biginteger('id_user')->unsigned();
            $table->biginteger('id_movie')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_movie')->references('id')->on('movies');
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
        Schema::dropIfExists('movements');
    }
}
