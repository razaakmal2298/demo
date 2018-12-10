<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Currency;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\Cart;
use Session;
use Carbon\Carbon;

class OrderController extends Controller
{

    public function create()
    {
        $carts = Cart::with('product')->where('user_id', auth()->user()->id)->get();

        $addresses = Address::where('user_id', auth()->user()->id)->get();

        $curr = Currency::where('country_id', Session::get('country_id'))->get();
        
        $currencies = Currency::All();

        return view('order.index', compact('carts', 'addresses', 'currencies', 'curr'));
    }
    
    public function store(Request $request)
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $currencies = Currency::All();
        $total_amount = 0;

        foreach ($carts as $cart) {

            $total_amount = $total_amount + $cart->price * $cart->quantity;

        }

        $data1 = [
            "address_type"   => $request->optradio,
            "user_id" => auth()->user()->id,
             "status"  => 1,
            "expected_delivery_date" => Carbon::parse('2019-01-01'),
            "delivery_date" => Carbon::parse('2019-10-01'),
            "total_amount" => $total_amount          
        ];

        $order = Order::create($data1);

        foreach ($carts as $cart) {

            $data2 = [

            "order_id"   => $order->id,
            "product_id"   => $cart->product_id,
            "price" => $cart->price,
            "quantity"  => $cart->quantity,
            "tax" => 18,
            "status" => 1,
            "expected_delivery_date" => Carbon::parse('2019-01-01'),
            "delivery_date" => Carbon::parse('2019-10-01'),         
        ];

        $orderproducts = OrderProduct::create($data2);

        }

        $carts = Cart::where('user_id', auth()->user()->id)->delete();
       
        return redirect()->route('order.show');
    }

    public function show()
    {   
        $currencies = Currency::All();

        $orders = Order::with('orderproduct.product')->where('user_id', auth()->user()->id)->get();
        
        return view('order.show', compact('currencies', 'orders'));

    }

}
