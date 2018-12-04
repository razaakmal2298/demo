@extends('layouts.app')

@section('content')
<div class="container">
    @if(!empty($successMsg))
  		<div class="alert alert-success"> {{ $successMsg }}</div>
	@endif

@if(count($orders) == 0)
	<div class="alert alert-warning">
		<strong>Sorry!</strong> There is no orders has been made yet.
	</div> 
	<div>
		<a href="{{route('product.index')}}" type="button" class="btn btn-default">Continue Shopping</a>
	</div>
@else


@foreach($orders as $order)
	<div class="container" style="border: 2px solid black; margin-top: 10px;">
		<div class="row">
			<p>Order No: {{$order->id}},     </p>
			<p>Total Amount: {{$order->total_amount}}</p>
		</div>
	@foreach($order->orderproduct as $orderproduct)
		<ul>
			<li>Product Id: {{$orderproduct->product_id}}</li>
			<li>Product Price: {{$orderproduct->price}}</li>
			<li>Quantity: {{ $orderproduct->quantity }}</li>
			@if($orderproduct->status == 1)
				<li>Order Status: Placed</li>
			@elseif($orderproduct->status == 2)
				<li>Order Status: Shipped</li>
			@elseif($orderproduct->status == 3)
				<li>Order Status: Delivered</li>
			@endif
		</ul>
	@endforeach
	</div>
@endforeach


@endif
</div>
@endsection