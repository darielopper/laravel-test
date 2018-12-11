<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';

    protected $fillable = ['client', 'amount'];

    public function offer(){
        return $this->belongsTo(Offer::class, 'offer_id');
    }
}
