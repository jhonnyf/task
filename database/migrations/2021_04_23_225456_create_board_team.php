<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardTeam extends Migration
{

    public function up()
    {
        Schema::create('board_team', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->foreignId('board_id')->references('id')->on('boards')->cascadeOnDelete();
            $table->foreignId('team_id')->references('id')->on('teams')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('board_team');
    }
}
