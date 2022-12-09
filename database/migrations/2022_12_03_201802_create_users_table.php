<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
           $table->increments('id')->unsigned();
            $table->string('nom');
            $table->string('prenoms');
            $table->string('telephone')->unique();
            $table->string('telephone2')->unique()->nullable();
            $table->string('email')->nullable();
            $table->string('date_naissance')->nullable();
            $table->string('genre')->nullable();
            $table->boolean('is_admin')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->double('montant')->default(0);
            $table->rememberToken();
            $table->string('profession')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('code_agent')->nullable();
            $table->integer('pays_id')->unsigned()->nullable();
            $table->foreign('pays_id')
                ->references('id')
                ->on('pays')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->integer('type_user_id')->unsigned()->nullable();
            $table->foreign('type_user_id')
                    ->references('id')
                    ->on('type_user')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->integer('carnet_sante_id')->unsigned()->nullable();
            $table->foreign('carnet_sante_id')
                            ->references('id')
                            ->on('carnet_santes')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');

            $table->integer('location_id')->unsigned()->nullable();
            $table->foreign('location_id')
                            ->references('id')
                            ->on('locations')
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
        Schema::dropIfExists('users');
    }
}
