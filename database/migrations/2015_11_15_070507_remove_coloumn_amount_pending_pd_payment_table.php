<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColoumnAmountPendingPdPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pending_pd_payment', function (Blueprint $table) {
            $table->dropColumn('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pending_pd_payment', function (Blueprint $table) {
            //
        });
    }
}
