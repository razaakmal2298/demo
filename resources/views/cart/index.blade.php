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
						@for ($i = 0; $i < 10; $i++)
	    					<option value="{{$i}}" {{ ( $i == $cart->quantity) ? "selected" : "" }}>{{$i}}</option>
						@endfor
		                </select>
						<a href="{{route('cart.delete', $cart->id)}}" type="button" class="btn btn-secondary">Remove</a>
					</div>
				</div>
			</form>
			@endforeach
		</div>
		<div class="col-md-4">
			<p>Total Price: {{$curr[0]->symbol}} {{$total * $curr[0]->conversion_rate }}</p>
			<a href="{{route('order.show')}}" type="button" class="btn btn-primary">Place Order</a>
		</div>	
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