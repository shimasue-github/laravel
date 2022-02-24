<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportantsTable extends Migration
{
    public function up()
    {
        Schema::create('importants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bigname');
            $table->string('name');
            $table->string('pass');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('importants');
    }
}
