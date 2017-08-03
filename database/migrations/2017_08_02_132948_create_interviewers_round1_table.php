<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewersRound1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('InterviewRoundOne', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('email_id');
            $table->integer('Section_1_marks'); 
            $table->integer('Section_2_marks'); 
            $table->integer('Section_3_marks'); 
            $table->integer('Total'); 
            $table->string('Status'); 
            $table->foreign('id')->references('id')->on('interviewers');
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
        Schema::dropIfExists('InterviewRoundOne');
    }
}
