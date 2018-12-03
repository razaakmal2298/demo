<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Currency;
use App\Models\User;
use App\Models\Cart;
use Session;

class ProductController extends Controller
{
    public function index(Request $request)
    {   

        $products = Product::All();
        $curr = Currency::where('country_id', Session::get('country_id'))->get();
        $currencies = Currency::All();
        
        return view('product.index', compact('products', 'currencies', 'curr'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        $currencies = Currency::All();
        $curr = Currency::where('country_id', Session::get('country_id'))->get();
        
        return view('product.product', compact('product', 'currencies', 'curr'));
    }
}
