<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardUser extends Migration
{
   
    public function up()
    {
        Schema::create('board_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->foreignId('board_id')->references('id')->on('boards')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();    
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('board_user');
    }
}
