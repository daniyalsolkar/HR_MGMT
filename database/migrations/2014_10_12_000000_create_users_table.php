<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(true);
            $table->string('email')->unique();
            $table->string('password')->nullable(false);
            $table->string('mobile_no')->nullable(true);
            $table->string('gender')->nullable(true);
            $table->date('dob')->nullable(true);
            $table->string('address')->nullable(true);
            $table->date('anivarsary')->nullable(true);
            $table->string('platform')->nullable(true);
            $table->string('experience')->nullable(true);
            $table->string('skills')->nullable(true);
            $table->string('profile_pic')->nullable(true);
            $table->float('ctc')->nullable(true);
            $table->rememberToken();
            $table->timestamps();
        });

        $user = User::create([
            'email' => 'admin@tailoredtech.in',
            'name' => 'Jon Snow',
            'password' => bcrypt('secret')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
