<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonneAPrevenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personne_a_prevenirs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string("nom_personne1")->nullable();
            $table->string("prenom_personne1")->nullable();
            $table->string("telephone_personne1")->nullable();

            $table->string("nom_personne2")->nullable();
            $table->string("prenom_personne2")->nullable();
            $table->string("telephone_personne2")->nullable();

            $table->string("nom_personne3")->nullable();
            $table->string("prenom_personne3")->nullable();
            $table->string("telephone_personne3")->nullable();
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
        Schema::dropIfExists('personne_a_prevenirs');
    }
}
