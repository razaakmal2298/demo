@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Products</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">		        
	        <img src="{{ asset($product->image) }}">
	    </div>
	    <div class="col-md-6">
	    	<p>Product Name: {{ $product->name }}</p>
	    	<p>Description: {{ $product->description }}</p>
	    	<p>Company: {{ $product->company }}</p>
	    	<p>Price: {{$curr[0]->symbol}} {{ $product->price * $curr[0]->conversion_rate }}</p>
	    	<p>Product Id: {{ $product->sku }}</p>
	    	<a href="{{route('order.show', $product->id)}}" class="btn btn-primary">Place Order</a>
	    </div>
    </div>
</div>
@endsection