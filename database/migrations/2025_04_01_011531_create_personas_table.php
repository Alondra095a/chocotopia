<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    public function up()
    {
       
        
    }

    public function down()
    {
        // Esta función revierte los cambios si necesitas eliminar la tabla
        Schema::dropIfExists('personas');
    }
}
