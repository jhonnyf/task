<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsChecklistsItems extends Migration
{
    
    public function up()
    {
        Schema::create('checklists_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('active')->default(1);
            $table->foreignId('checklist_id')->references('id')->on('checklists')->cascadeOnDelete();
            $table->integer('sort')->default(0);
            $table->string('checklist_item');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('cards_checklists_items');
    }
}
