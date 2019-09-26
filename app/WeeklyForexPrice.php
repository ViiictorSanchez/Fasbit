<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeeklyForexPrice extends Model
{
    //
    public function forex() {
        return $this->belongsTo('App\Forex'); 
    }

}
