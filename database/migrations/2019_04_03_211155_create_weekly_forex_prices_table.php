<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeklyForexPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('weekly_forex_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->float('open');
            $table->float('close');

            $table->integer('forex_id')->unsigned();            
            $table->foreign('forex_id')->references('id')->on('forexes');

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
        //
        Schema::dropIfExists('weekly_forex_prices');
    }
}
