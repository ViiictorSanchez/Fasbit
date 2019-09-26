<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forex extends Model
{
    //
    public function weeklyPrices(){
    	return $this->hasMany('App\WeeklyForexPrice');
    }
    public function dailyPrices(){
        return $this->hasMany('App\DailyForexPrice');
    }

    public function delete(){
    	$this->weeklyPrices()->delete();
    	$this->dailyPrices()->delete();
    	return parent::delete();
    }
}
