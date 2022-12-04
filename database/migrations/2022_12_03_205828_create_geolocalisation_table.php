<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeolocalisationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geolocalisations', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('libelle');

            $table->string('continent');
            $table->string('pays');
            $table->string('zone');
            $table->string('latitude');
            $table->string('longitude');


            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('photo');
            $table->integer('type')->unsigned();
            $table->foreign('type')
                    ->references('id')
                    ->on('type_cas')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
             $table->integer('status')->unsigned();
             $table->foreign('status')
                    ->references('id')
                    ->on('status')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
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
        Schema::dropIfExists('geolocalisation');
    }
}
