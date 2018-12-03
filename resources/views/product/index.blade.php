@extends('layouts.app')

@section('content')
<div class="container">
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
	
    <div class="row justify-content-center">
	    @foreach($products as $product)
            <div class="col-md-3 text-center">
                <form method="POST" action="{{ route('cart.create', $product->id) }}">
                @csrf
                	<img src="{{ asset($product->image) }}" >
                    <h4>{{ $product->company }}</h4>
                	<p>{{ $product->name }}</p>
                    <p><span>{{$curr[0]->name }}: </span><span>{{$curr[0]->symbol }}</span>{{ $product->price * $curr[0]->conversion_rate }}</p>
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <select class="form-control" name="quantity">
                        @for ($i = 1; $i < 10; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
            	<div class="modal-footer">
            		<button type="submit" class="btn btn-primary">Add to cart</button>
            	</div>
                </form>
            </div>
		@endforeach  
    </div>
</div>
@endsection