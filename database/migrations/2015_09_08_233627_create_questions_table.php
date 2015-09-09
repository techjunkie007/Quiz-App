<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create Questions Table
        Schema::create('questions', function (Blueprint $table)
        {
            //Questions Table Entities
            $table->increments('id');
            $table->char('question_type', 10);
            $table->text('question_data');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop Questions Table
        Schema::drop('questions');
    }
}
