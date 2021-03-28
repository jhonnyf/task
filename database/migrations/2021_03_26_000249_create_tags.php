<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTags extends Migration
{

    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('active')->default(1);
            $table->foreignId('board_id')->references('id')->on('boards')->cascadeOnDelete();
            $table->string('tag', 120)->nullable();
            $table->string('color', 7);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
