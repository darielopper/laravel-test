<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoffeeSize extends Model
{
    public $table = 'coffeesizes';

    protected $fillable = ['name'];

    public function offers(){
        return $this->hasMany(Offer::class, 'coffeesize_id');
    }
}
