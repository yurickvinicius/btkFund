<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->char('operation_type',1);
            $table->integer('operation_volume');
            $table->string('entry_price',60);
            $table->string('exit_price',60);
            $table->string('stop_loss',60);
            $table->string('take_profit',60);
            $table->string('result_profit',60);
            $table->string('current_profit',60);
            $table->dateTime('data_hour_operation');
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
        Schema::dropIfExists('results');
    }
}
