<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreteTeams extends Migration
{
    
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('active')->default(1);
            $table->string('team', 120)->nullable();            
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
