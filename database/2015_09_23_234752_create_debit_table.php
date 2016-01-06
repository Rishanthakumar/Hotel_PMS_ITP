<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit', function (Blueprint $table) {
            $table->timestamp('date');
            $table->increments('debit_id');
            $table->integer('folio_num')->unsigned();
            $table->double('amount',8,2);

            $table->foreign('folio_num')->references('folio_num')->on('folio');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('debit');
    }
}
