<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTypes extends Migration
{

    public function up()
    {
        Schema::create('files_types', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('active')->default(1);
            $table->string('file_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('files_types');
    }
}
