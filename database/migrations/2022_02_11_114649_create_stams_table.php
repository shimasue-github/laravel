<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStamsTable extends Migration
{
    public function up()
    {
        Schema::create('stams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('day');
            $table->time('in');
            $table->time('out');
            $table->time('vacation');
            $table->time('interval');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stams');
    }
}
