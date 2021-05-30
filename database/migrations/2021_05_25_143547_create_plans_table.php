<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('cpu');
            $table->integer('memory');
            $table->integer('swap');
            $table->integer('disk');
            $table->integer('io');
            $table->integer('databases');
            $table->integer('backups');
            $table->integer('allocations');
            $table->integer('price');
            $table->string('price_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
