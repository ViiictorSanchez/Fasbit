<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_coin');
            $table->integer('rank');
            $table->string('symbol');
            $table->string('name');
            $table->decimal('price',24,5);
            $table->string('f_price');
            $table->float('percent_change_24h');
            $table->double('percent_change_7d',8,2);
            $table->double('percent_change_14d',8,2);
            $table->double('percent_change_30d',8,2);
            $table->double('percent_change_90d',8,2);
            $table->decimal('volume_24h',24,5);
            $table->decimal('volume_7d',24,5);
            $table->decimal('volume_14d',24,5);
            $table->decimal('volume_30d',24,5);
            $table->decimal('volume_90d',24,5);
            $table->string('f_volume_24h');
            $table->decimal('market_cap',24,2);
            $table->string('f_market_cap');
            $table->string('image_url');
            
            $table->string('btc_price');
            $table->integer('status');

            $table->string('website');
            $table->string('algorithm');
            $table->string('prooftype');
            $table->string('total_supply');
            $table->longText('description');
            $table->longText('features');
            $table->longText('technology');

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
        Schema::dropIfExists('coins');
    }
}
