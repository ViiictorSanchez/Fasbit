<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    public function weeklyPrices(){
        return $this->hasMany('App\WeeklyStockPrice');
    }
    public function dailyPrices(){
        return $this->hasMany('App\DailyStockPrice');
    }
    public function delete(){
        $this->weeklyPrices()->delete();
        $this->dailyPrices()->delete();
        return parent::delete();
    }
}
