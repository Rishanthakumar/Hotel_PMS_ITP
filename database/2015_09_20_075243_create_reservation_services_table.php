<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_services', function (Blueprint $table) {
            $table->integer('res_id')->unsigned();
            $table->string('room_id',5);
            $table->string('service_id',6);

            $table->primary(array('res_id','room_id','service_id'));
            $table->foreign('res_id')->references('res_id')->on('reservation');
            $table->foreign('service_id')->references('service_id')->on('services');
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
        Schema::drop('reservation_services');
    }
}
