@extends('layouts.app')

@section('content')
<div class="container">
	@if($errors->any())
		<h4>{{$errors->first()}}</h4>
		@endif
	<h3>Select Delivery address</h3>
	<form role="form" method="POST" enctype="multipart/form-data" action="{{route('order.store')}}" style="display: flex;">
		@csrf
		@foreach($addresses as $address)
		<div class="col-md-4">
			<div class="radio">
				@if($address->address_type == 1)
  				<label><input type="radio" name="optradio" value="{{$address->address_type}}" checked>Office</label>
				@elseif($address->address_type == 2)
				<label><input type="radio" name="optradio" value="{{$address->address_type}}">Home</label>
				@else
				<label><input type="radio" name="optradio" value="{{$address->address_type}}">Other</label>
				@endif
				<p>{{$address->name}}</p>
				<p>{{$address->address}}, <span>{{$address->state}}, </span></p>
				<p>{{$address->pincode}}</p>
				<p>Mobile Number: {{$address->contact}}</p>
			</div>
		</div>
		@endforeach
	
		<div class="col-md-4">
			<div>
				@foreach($carts as $cart)
					<p>Product Sku: {{$cart->sku}}  <span>Price: {{$cart->price}}</span></p>
				@endforeach	
				<p>Total Amount: {{$curr[0]->symbol}} {{ $total * $curr[0]->conversion_rate }}</p>
			</div>
			<div>
				<button type="submit" class="btn btn-primary">Buy</button>	
			</div>
		</div>
		</form>
</div>
</div>
@endsection