<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'orders';

    protected $fillable = ['client', 'amount'];

    public function offer(){
        return $this->belongsTo(Offer::class, 'offer_id');
    }
}
