<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumns extends Migration
{

    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('active')->default(1);
            $table->foreignId('board_id')->references('id')->on('boards')->cascadeOnDelete();
            $table->string('column', 120);
            $table->integer('sort')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('columns');
    }
}
