<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoffeeType extends Model
{
    public $table = 'coffeetypes';

    protected $fillable = ['name'];

    public function offers(){
        return $this->hasMany(Offer::class, 'coffeetype_id');
    }
}
