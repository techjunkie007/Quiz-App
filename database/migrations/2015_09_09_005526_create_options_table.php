<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create Options Table
        Schema::create('options', function (Blueprint $table) 
        {
            //All Table Entities
            $table->increments('id');
            $table->integer('question_id');
            $table->text('option_data');
            $table->integer('correct_flag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop Options Table
        Schema::drop('options');
    }
}
