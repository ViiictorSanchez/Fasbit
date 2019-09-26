<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeeklyStockPrice extends Model
{
    //
    public function stock() {
        return $this->belongsTo('App\Stock'); 
    }

}
