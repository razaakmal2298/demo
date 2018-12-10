@extends('layouts.app')

@section('content')
<div class="container">
	@if($errors->any())
		<h4>{{$errors->first()}}</h4>
	@endif
	<h3>Select Delivery address</h3>
	<form role="form" method="POST" enctype="multipart/form-data" action="{{route('order.store')}}" style="display: flex;">
		@csrf
		
		
		<div class="col-md-8">
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
				<p class="name">{{$address->name}}</p>
				<p class="address">{{$address->address}},</p> 
				<p class="state">{{$address->state}}</p>
				<p class="pincode">{{$address->pincode}}</p>
				<p class="contact">{{$address->contact}}</p>
			</div>
		</div>
		@endforeach
		<button type="button" id="add" class="btn btn-primary" data-toggle="modal" data-target="#addModal" style="margin-top: 10px;">Add New Address</button>
		</div>
		
		<div class="col-md-4">
			<div>
				@php($total = 0)
				@foreach($carts as $cart)
					<ul>
						<li>Product: {{$cart->product->name}}</li>
						<li>Price: {{$curr[0]->symbol}} {{$cart->product->price * $curr[0]->conversion_rate}}</li>
						<li>Quantity: {{$cart->quantity}}</li>
						@php($total = $total + $cart->price * $cart->quantity)	
					</ul>
				@endforeach	
				<p>Total Amount: {{$curr[0]->symbol}} {{ $total * $curr[0]->conversion_rate }}</p>
			</div>
			<div>
				<button type="submit" class="btn btn-primary">Checkout</button>	
			</div>
		</div>
		
		</form>
</div>


		<!-- Add Modal -->
		<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Add Address</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		       <form action="{{route('address.add')}}" method="POST">
		       	@csrf
			      <div class="modal-body">
			        <div class="form-group">
	                    <label for="name">Name:</label>
	                    <input type="text" name="name" id="name" class="form-control" required>
	                </div>
	                <div class="form-group">
	                    <label for="contact">Contact:</label>
	                    <input type="text" name="contact" id="contact" class="form-control" required>
	                </div>
	                <div class="form-group">
	                    <label for="address">Address:</label>
	                    <input type="text" name="address" id="address" class="form-control" required>
	                </div>
	                 <div class="form-group">
	                    <label for="state">State:</label>
	                    <input type="text" name="state" id="state" class="form-control" required>
	                </div>
	                <div class="form-group">
	                    <label for="pincode">Pincode:</label>
	                    <input type="text" name="pincode" id="pincode" class="form-control" required>
	                </div>
	                <div class="form-group">
                        <label for="type">Address Type:</label>
                        <div class="select-styled">
	                        <select class="form-control" name="address_type" required>
                                <option value="1">Office</option>
                                <option value="2">Home</option>
                                <option value="3">Other</option>
	                        </select>
                        </div>
                    </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" >Save changes</button>
			      </div>     
		      </form>
		    </div>
		  </div>
		</div>
	</div>
</div>
@endsection

