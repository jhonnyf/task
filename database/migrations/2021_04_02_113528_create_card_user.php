<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardUser extends Migration
{
  
    public function up()
    {
        Schema::create('card_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->foreignId('card_id')->references('id')->on('cards')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();    
        });
    }


    public function down()
    {
        Schema::dropIfExists('card_user');
    }
}
