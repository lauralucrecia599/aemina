<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{

    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('descripcion',10000);
            $table->string('imagen');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
