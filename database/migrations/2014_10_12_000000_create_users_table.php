<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('roles', function (Blueprint $table) {

            $table->increments('id');
            $table->string('descripcion',50)->unique();
            $table->string('permisos',200);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('active')->default(true);
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();

        });

        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('bio')->nullable();
            $table->string('twitter')->nullable();
            $table->string('website')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
        Schema::drop('user_profiles');
        Schema::drop('users');
        Schema::drop('roles');
    }
}
