@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h1>Addresses</h1>
	</div>
	<div class="row">
		@foreach($addresses as $address)
		<div class="col-md-12">			
			@if($address->address_type == 1)
				<h3>Office</h3>
			@elseif($address->address_type == 2)
				<h3>Home</h3>
			@else
				<h3>Other</h3>
			@endif
			<p class="name">{{$address->name}}</p>
			<p class="address">{{$address->address}},</p> 
			<p class="state">{{$address->state}}</p>
			<p class="pincode">{{$address->pincode}}</p>
			<p class="contact">{{$address->contact}}</p>
			<button type="button" id="edit" class="btn btn-primary" data-toggle="modal" data-id="{{$address->id}}" data-target="#editModal">Edit</button>
			<button type="button" id="delete" class="btn btn-default" data-toggle="modal" data-id="{{$address->id}}" data-target="#deleteModal">Delete</button>
		</div>
		@endforeach

		<!-- Delete Modal-->
		<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p>Are you sure you want to delete this address?</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        <button type="button" class="btn btn-primary" id="delete-modal">
		        Delete</button>
		      </div>
		      <form id="delete-form" action="" method="POST" style="display: none;">
		      	@csrf

		      </form>
		    </div>
		  </div>
		</div>

		<!-- Edit Modal -->
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Edit Address</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		       <form id="edit-form" action="" method="POST">
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
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary" id="edit-modal">Save changes</button>
			      </div>     
		      </form>
		    </div>
		  </div>
		</div>
	</div>

	<div class="row" style="margin-top: 20px;">
		<div class="col-md-12">
			<button type="button" id="add" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New Address</button>
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

@push('scripts')
    <script type="text/javascript">
    	$('button#delete').click(function(){

    		$('#delete-form').attr('action', "{{ route('address.delete', '') }}/"+$(this).data('id'));

    		$('#delete-modal').click(function(){
    			document.getElementById('delete-form').submit();
    		})
    	})

    	$('button#edit').click(function(){
   
    		var name = $(this).siblings('.name').text()
    		var contact = $(this).siblings('.contact').text()
    		var address = $(this).siblings('.address').text()
    		var state = $(this).siblings('.state').text()
    		var pincode =  $(this).siblings('.pincode').text()

    		$('#name').val(name)
    		$('#contact').val(contact)
    		$('#address').val(address)
    		$('#state').val(state)
    		$('#pincode').val(pincode)

    		$('#edit-form').attr('action', "{{ route('address.edit', '') }}/"+$(this).data('id'));

    		$('#edit-modal').click(function(){
    			document.getElementById('edit-form').submit();
    		})
    	})
    </script>
@endpush