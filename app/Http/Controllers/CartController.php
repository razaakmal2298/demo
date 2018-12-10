<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Currency;
use Session;
use Response;

class CartController extends Controller
{
    public function create(Request $request, $id)
    {   
        
        $carts = Cart::where([
                
                ['product_id', '=', $id],
                ['user_id', '=', auth()->user()->id],

            ])->get();

        foreach ($carts as $cart) {
            
            if (($cart->product_id) && ($cart->quantity != $request->quantity))
            {              
                Cart::where([

                    ['product_id', $request->id],
                    ['user_id', '=', auth()->user()->id],

                ])->update(array(

                    "quantity" => $request->quantity
                ));
                
                $response = array(
                    'status' => 'success',
                    'msg' => 'Quantity updated',
                );
        
                return Response::json($response);
            }
            else 
            {
                $response = array(
                    'status' => 'success',
                    'msg' => 'Already added to cart',
                );
        
                return Response::json($response);
            }
        }

        $data = [

            "product_id" => $request->id,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "user_id" => auth()->user()->id,
            
        ];
        
        Cart::create($data);
        
        $response = array(
            'status' => 'success',
            'msg' => 'Added to cart',
        );
        
        return Response::json($response);
	
    }

    public function show()
    {
        $currencies = Currency::all();
        $curr = Currency::where('country_id', Session::get('country_id'))->get();

        $carts = Cart::with('product')->where('user_id', auth()->user()->id)->get();   

        return view('cart.index', compact('currencies', 'carts', 'curr') );
    }

    public function update(Request $request, $id)
    {   

        Cart::where([
                
                ['id', '=', $id],
                ['user_id', '=', auth()->user()->id],

            ])->update(array(

                "quantity" => $request->quantity
        ));

        $carts = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        
        return redirect()->back()->withErrors(['Cart has been updated.']);

    }

    public function delete($id)
    {
        Cart::where([
                
                ['id', '=', $id],
                ['user_id', '=', auth()->user()->id],

            ])->delete();
        
        return redirect()->back()->withErrors(['Cart has been updated.']);

    }
}
