<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoutienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soutien', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('titre');
            $table->string('objectif');
            $table->string('commentaire');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                            ->references('id')
                            ->on('users')
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
        Schema::dropIfExists('soutien');
    }
}
