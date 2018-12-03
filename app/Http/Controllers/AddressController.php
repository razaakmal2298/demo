<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Currency;

class AddressController extends Controller
{
    public function index()
    {	
    	$currencies = Currency::All();

    	$addresses = Address::where('user_id', auth()->user()->id)->get();

    	return view('address.index', compact('currencies', 'addresses'));
    }

    public function delete(Request $request, $id)
    {	
    	Address::where('id', $id)->delete();

    	return back()->withMessage('Address has been deleted');
    }

    public function update(Request $request, $id)
    {
    	

    	Address::where('id', $id)->update(array(
            
            "name" => $request->name,
            "contact"      => $request->contact,
            "address"     => $request->address,
            "state"          => $request->state,
            "pincode"      => $request->pincode,


        ));

    	return back()->withMessage('Address has been updated');
    }

    public function create(Request $request)
    {

    	$data = [
                    "name" => $request->name,
		            "contact" => $request->contact,
		            "address" => $request->address,
		            "state" => $request->state,
                    "country" => 'india',
		            "pincode" => $request->pincode,
		            "address_type" => $request->address_type,
		            "user_id" => auth()->user()->id

                ];

        $address = Address::create($data);

        return back()->withMessage('Address has been created');
    }
}
