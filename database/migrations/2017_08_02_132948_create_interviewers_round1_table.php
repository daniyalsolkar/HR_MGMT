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
            $table->integer('section_1_marks'); 
            $table->integer('section_2_marks'); 
            $table->integer('section_3_marks'); 
            $table->float('total')->nullable(true); 
            $table->string('status')->nullable(true); 
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
