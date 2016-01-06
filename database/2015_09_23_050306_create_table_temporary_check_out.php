<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTemporaryCheckOut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_check_out', function (Blueprint $table) {
            $table->increments('temp_id');
            $table->integer('res_id')->unsigned();
            $table->timestamp('temp_check_out');
            $table->timestamp('temp_check_in');
            $table->string('status');
            $table->string('reason');

            $table->foreign('res_id')->references('res_id')->on('reservation');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('temporary_check_out');
    }
}
