<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public $table = 'offers';

    public function type(){
        return $this->belongsTo(CoffeeType::class, 'coffeetype_id');
    }

    public function size(){
        return $this->belongsTo(CoffeeSize::class, 'coffeesize_id');
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function __toString()
    {
        return sprintf("%s - %s", $this->type->name, $this->size->name);
    }
}
