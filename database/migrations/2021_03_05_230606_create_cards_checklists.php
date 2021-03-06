<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsChecklists extends Migration
{
 
    public function up()
    {
        Schema::create('checklists', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('active')->default(1);
            $table->foreignId('card_id')->references('id')->on('cards')->cascadeOnDelete();
            $table->integer('sort')->default(0);
            $table->string('checklist');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cards_checklists');
    }
}
