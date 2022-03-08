<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarnetSanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carnet_santes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('antecedent')->nullable();
            $table->string('sexe')->nullable();
            $table->string('poids')->nullable();
            $table->string('taille')->nullable();
            $table->string('groupe')->nullable();
            $table->string('allergie')->nullable();
            $table->string('vaccination')->nullable();
            $table->string('maladie')->nullable();

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
        Schema::dropIfExists('carnet_santes');
    }
}
