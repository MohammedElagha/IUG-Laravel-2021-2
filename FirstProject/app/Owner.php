<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public function car () {
        return $this->hasOne('App\Car');
    }
}
