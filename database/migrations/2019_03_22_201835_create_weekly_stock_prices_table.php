<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeklyStockPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_stock_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date');
            $table->float('open');
            $table->float('close');

            $table->integer('stock_id')->unsigned();            
            $table->foreign('stock_id')->references('id')->on('stocks');

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
        Schema::dropIfExists('weekly_stock_prices');
    }
}
