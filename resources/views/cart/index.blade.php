@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h1>Cart</h1>
	</div>
	 @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
	<div class="row">
		<div class="col-md-8">
			@if(count($carts) == 0)
    		<div class="alert alert-warning">
        		<strong>Sorry!</strong> There is nothing in your bag.
    		</div> 
    		<div>
    			<a href="{{route('product.index')}}" type="button" class="btn btn-default">Continue Shopping</a>
    		</div>
    		@else
			@foreach($carts as $cart)                                     
			<form id="quantity_{{ $cart->id }}" action="{{ route('cart.update', $cart->id) }}" method="POST" style="margin-top: 20px; border: 2px solid;">
				@csrf
				<div class="row">	
					<div class="col-md-6">
						<img src="{{ asset($cart->product->image) }}">
					</div>
					<div class="col-md-6">
						<p>Product Name: {{$cart->product->name}}</p>
						<p>Brand: {{$cart->product->company}}</p>
						<p>SKU: {{$cart->product->sku}}</p>
						<p>Price: {{$curr[0]->symbol}} {{$cart->price * $curr[0]->conversion_rate }}</p>
						
						<select class="form-control" name="quantity" onchange="jsfunction('{{ $cart->id }}')">
						@for ($i = 1; $i < 10; $i++)
	    					<option value="{{$i}}" {{ ( $i == $cart->quantity) ? "selected" : "" }}>{{$i}}</option>
						@endfor
		                </select>
						<a href="{{route('cart.delete', $cart->id)}}" type="button" class="btn btn-secondary">Remove</a>
					</div>
				</div>
			</form>
			@endforeach
			@endif
		</div>
		@if(count($carts) != 0)
			@php($total = 0)
			@foreach($carts as $cart) 
				@php($total = $total + $cart->price * $cart->quantity)
			@endforeach	
			<div class="col-md-4">
				<p>Total Price: {{$curr[0]->symbol}} {{	$total * $curr[0]->conversion_rate }}</p>
				<a href="{{route('order.create')}}" type="button" class="btn btn-primary">Place Order</a>
			</div>
		@endif
	</div>
</div>
@endsection

@push('scripts')
	<script type="text/javascript">
		function jsfunction(id)
		{
			console.log('change')
			document.getElementById('quantity_'+id).submit();
		}
	</script>
@endpush