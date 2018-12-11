<?php

namespace App\Http\Controllers;

use App\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function ajax_list(){
        $offers = Offer::all();
        $offers = $offers->map(function(Offer $offer){
            $data = $offer->toArray();
            $data['size'] = $offer->size->name;
            $data['type'] = $offer->type->name;
            return $data;
        });
        return response()->json($offers);
    }
}
