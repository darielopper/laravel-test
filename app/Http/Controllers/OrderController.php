<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view("order.index");
    }

    public function ajax_list(){
        $orders = Order::all();
        $orders = ($orders->map(function($item){
            $toAdd = $item->toArray();
            $toAdd['offer'] = (string) $item->offer;
            $toAdd['price'] = $item->amount * $item->offer->price;
            return $toAdd;
        }));
        return response()->json($orders);
    }
}
