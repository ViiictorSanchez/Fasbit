<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyForexPrice extends Model
{
    //
    public function forex() {
        return $this->belongsTo('App\Forex'); 
    }

}
