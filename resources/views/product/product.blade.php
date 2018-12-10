@extends('layouts.app')

@section('content')
<div class="container">
	<h1>Products</h1>
	<form method="POST" action="{{ route('cart.create', $product->id) }}">
		<div class="row">
	        <div class="col-md-6">		        
		        <img src="{{ asset($product->image) }}">
		    </div>
		    <div class="col-md-6">
		    	<p>Product Name: {{ $product->name }}</p>
		    	<p>Description: {{ $product->description }}</p>
		    	<p>Company: {{ $product->company }}</p>
		    	<p>Price: {{$curr[0]->symbol}} {{ $product->price * $curr[0]->conversion_rate }}</p>
		    	<p>Product Id: {{ $product->sku }}</p>
		    	<input type="hidden" id="price" name="price" value="{{$product->price}}">
		    	<select class="form-control" id="quantity" name="quantity">
		            @for ($i = 1; $i < 10; $i++)
		                <option value="{{$i}}">{{$i}}</option>
		            @endfor
		        </select>
		    	<div class="modal-footer">
	            	<button type="submit" id="submitCart" class="btn btn-primary">Add to cart</button>
	            	<a href="{{ route('cart.show') }}" id="displayCart" class="btn btn-primary" style="display: none;">Go to cart-></a>
	       		</div>
		    </div>
	    </div>
	</form>
</div>
@endsection

@push('scripts')
<script type="text/javascript">

$('form').on('submit', function(e) {
       e.preventDefault(); 

       var price = $('#price').val();
       var quantity = $('#quantity').val();
       var url = $(this).attr('action');

       $.ajax({
           type: "POST",
           url: url,
           data: {
	           	  price:price,
	           	  quantity: quantity,
	           	  _token: "{{ csrf_token() }}"
	           	},           
           success: function (response) {
           		$("#quantity").hide()
                $("#submitCart").fadeOut(function(){
                    $("#displayCart").fadeIn().delay(10000).fadeOut(function(){
                    $("#submitCart").fadeIn();
              });
            })
            }
       });
   });
</script>
@endpush