<div class="modal fade" id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Payment Order</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="{{Route('booking.payments',$booking_id)}}" method="post">
	      	<input type="hidden" name="bookingDetails_id" value="{{isset($bookingDetails_id) ? json_encode($bookingDetails_id) : ''}}">
	      	{{csrf_field()}}

		      <div class="modal-body">
		        <div class="row">
		        	<div class="col-md-4">
		        		<div class="form-group">
		        			<label for="email2">Total price</label>
		        			<input type="text" name="total_price" class="form-control total_price" id="total_price" value="{{isset($total_price) ? $total_price : 0}}" readonly="true">
		        		</div>
		        	</div>
		        	<div class="col-md-4">
		        		<div class="form-group">
		        			<label for="email2">Paid amount</label>
		        			<input type="text" name="paid_amount" class="form-control paid_amount" id="paid_amount" value="{{isset($paid_amount) ? $paid_amount : 0}}" readonly="true">
		        		</div>
		        	</div>
		        	<div class="col-md-4">
		        		<div class="form-group">
		        			<label for="email2">Availabe Balance</label>
		        			<input type="text" name="availabe_balance" class="form-control availabe_balance" id="availabe_balance" value="{{isset(auth_user()->blance) ? auth_user()->blance : 0}}" readonly="true">
		        		</div>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button name="action" value="payment" class="btn btn-primary" {{isset(auth_user()->blance) && isset($total_price) && auth_user()->blance >= $total_price ? '' : 'disabled'}}>Payment with Wallet</button>
		        <button type="button" name="action" value="recharge" class="btn btn-info">Recharge Wallet</button>
		      </div>
		    </form>
	    </div>
	  </div>
	</div>