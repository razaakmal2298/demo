@extends('layouts.app')

@section('content')
<div class="container">
    @if(!empty($successMsg))
  <div class="alert alert-success"> {{ $successMsg }}</div>
@endif

@foreach($orders as $order)
	@if($order->status == 1)
		
	@endif
@endforeach
</div>
@endsection