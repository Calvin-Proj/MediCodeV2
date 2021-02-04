<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSickNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sick_notes', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->binary('path'); 
            $table->string('file'); 
            $table->integer('test_id');
            $table->integer("user_id"); //student //foreign
            $table->timestamps();
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sick__notes');
    }
}
