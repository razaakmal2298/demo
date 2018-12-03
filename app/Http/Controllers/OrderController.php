<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use Session;

class OrderController extends Controller
{

    public function show()
    {
        $carts = Cart::all();
        $total = 0;

        foreach($carts as $cart) {
            $total = $total + $cart->price * $cart->quantity;
        }

        $addresses = Address::where('user_id', auth()->user()->id)->get();

        $curr = Currency::where('country_id', Session::get('country_id'))->get();
        
        $currencies = Currency::All();

        return view('order.index', compact('carts', 'addresses', 'currencies', 'curr', 'total'));
    }
    
    public function store(Request $request)
    {
        $carts = Cart::all();
        $currencies = Currency::All();
        
        foreach ($carts as $cart) {

            $data = [
            "product_id" => $cart->id,
            "quantity" => $cart->quantity,
            "price" => $cart->price,
            "address_type"   => $request->optradio,
            "status"  => 1
        ];

        $order = Order::create($data);

        }

        Cart::truncate();
        $orders = Order::all();


        return view('order.status', compact('currencies', 'orders'))->with('successMsg','Your order has been placed.');
    }

}
