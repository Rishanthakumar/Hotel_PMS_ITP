<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToReservationRoomTypeCountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservation_room_type_count', function (Blueprint $table) {
            $table->integer('rate_code')->unsigned();

            $table->foreign('rate_code')->references('rate_code')->on('rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservation_room_type_count', function (Blueprint $table) {
            //
        });
    }
}
