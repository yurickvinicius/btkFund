<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRobotUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('robots_users', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('robot_id');
            $table->foreign('robot_id')->references('id')->on('robots');

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
        Schema::dropIfExists('robots_users');
    }
}
