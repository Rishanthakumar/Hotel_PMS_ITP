<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableResIdCusIdMemIdRoomNo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_id_cus_id_mem_id_room_no', function (Blueprint $table) {

            $table->integer('res_id')->unsigned();
            $table->integer('cus_id')->unsigned();
            $table->integer('mem_id')->unsigned();
            $table->char('room_id',5)->nullable();

            $table->primary(array('res_id','cus_id','mem_id'));
            $table->foreign('res_id')->references('res_id')->on('reservation');
            $table->foreign('cus_id')->references('cus_id')->on('customer');
            $table->foreign('mem_id')->references('mem_id')->on('member');
            $table->foreign('room_id')->references('room_id')->on('room');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('res_id_cus_id_mem_id_room_no');
    }
}
