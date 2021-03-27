<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTags extends Migration
{

    public function up()
    {
        Schema::create('card_tag', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->foreignId('card_id')->references('id')->on('cards')->cascadeOnDelete();
            $table->foreignId('tag_id')->references('id')->on('tags')->cascadeOnDelete();            
        });
    }


    public function down()
    {
        Schema::dropIfExists('card_tag');
    }
}
