<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCards extends Migration
{
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('active')->default(1);
            $table->foreignId('column_id')->references('id')->on('columns')->cascadeOnDelete();
            $table->integer('sort')->default(0);
            $table->string('card', 120);
            $table->text('description')->nullable();
            $table->dateTime('final_date')->nullable();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
