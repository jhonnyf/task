<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsUsers extends Migration
{

    public function up()
    {
        Schema::create('team_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreignId('team_id')->references('id')->on('teams')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('responsibility_id')->references('id')->on('responsibilities')->cascadeOnDelete();

            $table->unique(['team_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('team_user');
    }
}
