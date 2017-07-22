<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Interviewers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email_id');
            $table->string('experience');
            $table->string('position_applied');
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
        Schema::dropIfExists('Interviewers');
    }
}
