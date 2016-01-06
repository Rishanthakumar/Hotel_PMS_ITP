<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveForeignDriverIdVehicleReservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicle_reservation', function (Blueprint $table) {
            $table->dropForeign('vehicle_reservation_driver_id_foreign');
            $table->dropColumn('driver_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicle_reservation', function (Blueprint $table) {
            //
        });
    }
}
