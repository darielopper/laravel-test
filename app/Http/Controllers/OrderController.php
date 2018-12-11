<?php

namespace App\Http\Controllers;

use App\Offer;
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

    public function store(Request $request){
        $this->validate($request, [
            'client' => 'required|min:3',
            'amount' => 'required',
            'offer'  => 'required'
        ]);
        $offer = Offer::findOrFail($request->get('offer'));
        $order = new Order([
            'client' => $request->get('client'),
            'amount' => $request->get('amount')
        ]);
        $order->offer()->associate($offer);
        $order->save();
        $model = $order->toArray();
        $model['offer'] = (string)$offer;
        $model['price'] = $order->amount * $offer->price;
        return response()->json([
            'success' => true,
            'model' => $model
        ]);
    }
}
