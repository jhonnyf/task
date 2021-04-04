<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreteResponsibility extends Migration
{
 
    public function up()
    {
        Schema::create('responsibilities', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('active')->default(1);
            $table->string('responsibility', 120)->nullable();            
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('responsibilities');
    }
}
