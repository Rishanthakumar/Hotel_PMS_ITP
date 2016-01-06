<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFolioTableRemovwStatusAddRoomTypeRoomNo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('folio', function (Blueprint $table) {
            $table->dropColumn('status');

            $table->string('type');
            $table->string('room_id',5);
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
        Schema::table('folio', function (Blueprint $table) {
            //
        });
    }
}
