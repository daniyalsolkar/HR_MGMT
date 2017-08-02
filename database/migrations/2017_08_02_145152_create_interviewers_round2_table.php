<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewersRound2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('InterviewRoundTwo', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('communication');
            $table->string('program_logic');
            $table->string('puzzle');
            $table->string('data_structure');
            $table->float('total');
            $table->string('status');
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
        Schema::dropIfExists('InterviewRoundTwo');
    }
}
