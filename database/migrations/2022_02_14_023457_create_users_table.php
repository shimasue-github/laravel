<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company');
            $table->string('belongs');
            $table->string('surname');
            $table->string('name');
            $table->string('tel');
            $table->string('mail');
            $table->date('birthday');
            $table->string('pass');
            $table->string('address_up');
            $table->string('address_middle');
            $table->string('address_down');
            $table->mediumInteger('lat');
            $table->mediumInteger('lng');
            $table->string('hiredate');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
