<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReservationRoomTypeCount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_room_type_count', function (Blueprint $table) {
            $table->integer('res_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('count')->unsiigned();

            $table->primary(array('res_id','type_id'));
            $table->foreign('res_id')->references('res_id')->on('reservation');
            $table->foreign('type_id')->references('type_id')->on('room_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservation_room_type_count');
    }
}
