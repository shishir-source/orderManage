@extends('user::admin.layouts.app')
@section('style')
	<style type="text/css">
		.remove_class {
			padding-top: 30px;
			margin-left: -25px;
		}
		.booking-form-table-body table > tbody > tr > td{
			    padding: 0px !important;
		}
		.booking-form-table-body table > tbody > tr > td input {
			width: 160px;
		}
	</style>
@endsection
@section('content')
	
	<div class="page-header">
		<h4 class="page-title">Order</h4>
		<ul class="breadcrumbs">
			<li class="nav-home">
				<a href="#">
					<i class="flaticon-home"></i>
				</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Management</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="{{route('booking.draft.index')}}">Order</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="{{route('booking.draft.edit',(isset($booking->id) ? $booking->id : 0))}}">Update</a>
			</li>
		</ul>
	</div>

	<div>
		<div class="card">
			<div class="card-header">
				<div class="card-title">Create</div>
			</div>
			<form action="{{Route('booking.draft.edit',(isset($booking->id) ? $booking->id : 0))}}" method="post">
				{{csrf_field()}}
				<div class="card-body">
					<div class="card">
						<div class="card-body">
							<div class="row">
								@if(auth_user()->type == 'admin')
									<div class="col-md-3">
										<div class="form-group">
											<label>Customer Name</label>
											<input type="text" name="customer_name" class="form-control customer_name" id="customer_name" placeholder="" value="{{isset($booking->customer_name) ? $booking->customer_name : ''}}">
										</div>
									</div>
								@endif

								@if(auth_user()->type == 'admin' || auth_user()->type == 'customer')
									<div class="col-md-3">
										<div class="form-group">
											<label>Date</label>
											<input type="text" name="date" class="form-control date" id="date" placeholder="" value="{{isset($booking->date) ? $booking->date : ''}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Payment</label>
											<input type="text" name="payment" class="form-control payment" id="payment" placeholder="" value="{{isset($booking->payment) ? $booking->payment : ''}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="email2">Payment Reference</label>
											<input type="text" name="payment_reference" class="form-control payment_reference" id="payment_reference" placeholder="" value="{{isset($booking->payment_reference) ? $booking->payment_reference : ''}}">
										</div>
									</div>
								@endif
							</div>
							@if(auth_user()->type == 'admin')
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>USD Bill</label>
											<input type="text" name="bsd_bill" class="form-control bsd_bill" id="bsd_bill" placeholder="" value="{{isset($booking->bsd_bill) ? $booking->bsd_bill : ''}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Weight Charge</label>
											<input type="text" name="weight_charge" class="form-control weight_charge" id="weight_charge" placeholder="" value="{{isset($booking->weight_charge) ? $booking->weight_charge : ''}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Organic Cost</label>
											<input type="text" name="organic_cost" class="form-control organic_cost" id="organic_cost" placeholder="" value="{{isset($booking->organic_cost) ? $booking->organic_cost : ''}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="email2">Orgnaic Shipping Cost</label>
											<input type="text" name="orgnaic_shipping_cost" class="form-control orgnaic_shipping_cost" id="orgnaic_shipping_cost" placeholder="" value="{{isset($booking->orgnaic_shipping_cost) ? $booking->orgnaic_shipping_cost : ''}}">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Order Reference</label>
											<input type="text" name="order_reference" class="form-control order_reference" id="order_reference" placeholder="" value="{{isset($booking->order_reference) ? $booking->order_reference : ''}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Conv Rate</label>
											<input type="text" name="conv_rate" class="form-control conv_rate" id="conv_rate" placeholder="" value="{{isset($booking->conv_rate) ? $booking->conv_rate : ''}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Due</label>
											<input type="text" name="due" class="form-control due" id="due" placeholder="" value="{{isset($booking->due) ? $booking->due : ''}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="email2">Loss/Profit</label>
											<input type="text" name="loss_or_profit" class="form-control loss_or_profit" id="loss_or_profit" placeholder="" value="{{isset($booking->loss_or_profit) ? $booking->loss_or_profit : ''}}">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Currency Profit</label>
											<input type="text" name="currency_profit" class="form-control currency_profit" id="currency_profit" placeholder="" value="{{isset($booking->currency_profit) ? $booking->currency_profit : ''}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Shipping Profit</label>
											<input type="text" name="shipping_profit" class="form-control shipping_profit" id="shipping_profit" placeholder="" value="{{isset($booking->shipping_profit) ? $booking->shipping_profit : ''}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Total Profit</label>
											<input type="text" name="total_profit" class="form-control total_profit" id="total_profit" placeholder="" value="{{isset($booking->total_profit) ? $booking->total_profit : ''}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="email2">Remarks</label>
											<input type="text" name="remarks" class="form-control remarks" id="remarks" placeholder="" value="{{isset($booking->remarks) ? $booking->remarks : ''}}">
										</div>
									</div>
								</div>
							@endif
						</div>
					</div>

					<div class="card">
						<div class="card-body">
							<div class="booking-form-table-body table-responsive" style="height: 400px;">
								<table class="table table-bordered " style="overflow-y: scroll;" id="filed_increment">
								    <thead>
								      	<tr>
								        	<th>Name</th>
								        	<th>Link</th>
								        	<th>Price</th>
								        	<th>Offer</th>
								        	<th>Quantity</th>
								        	<th>Note</th>
								        	<th>Status</th>
								      	</tr>
								    </thead>
								    <tbody class="idclone" >
								    	    	@if(isset($booking) && count($booking) > 0)
								    	    		@foreach($booking->bookingDetails as $bookingDetails)
								    			      	<tr class="tr_clone">
								    			      		<input type="hidden" name="id[]" value="{{$bookingDetails->id}}" {{($bookingDetails->is_admin_aproved) ? "disabled" : ''}}>
								    				        <td>
								    				          <div class="form-group">
								    				              <input type="text" name="name[]" class="form-control name" id="name" value="{{$bookingDetails->name}}" {{($bookingDetails->is_admin_aproved) ? "disabled" : ''}}>
								    				          </div>
								    				        </td>

								    				        <td>
								    				          <div class="form-group">
								    				              <input type="text" name="link[]" class="form-control link" id="link" value="{{$bookingDetails->link}}" {{($bookingDetails->is_admin_aproved) ? "disabled" : ''}}>
								    				          </div>
								    				        </td>

								    				        <td>
								    				          <div class="form-group">
								    				              <input type="text" name="price[]" class="form-control price" id="price" value="{{$bookingDetails->price}}" {{($bookingDetails->is_admin_aproved) ? "disabled" : ''}}>
								    				          </div>
								    				        </td>

								    				        <td>
								    				          <div class="form-group">
								    				              <input type="text" name="offer[]" class="form-control offer" id="offer" value="{{$bookingDetails->offer}}" {{($bookingDetails->is_admin_aproved) ? "disabled" : ''}}>
								    				          </div>
								    				        </td>

								    				        <td>
								    				          <div class="form-group">
								    				              <input type="text" name="quantity[]" class="form-control quantity" id="quantity" value="{{$bookingDetails->quantity}}" {{($bookingDetails->is_admin_aproved) ? "disabled" : ''}}>
								    				          </div>
								    				        </td>		

								    				        <td>
								    				          <div class="form-group">
								    				              <input type="text" name="note[]" class="form-control note" id="note" value="{{$bookingDetails->name}}" {{($bookingDetails->is_admin_aproved) ? "disabled" : ''}}>
								    				          </div>
								    				        </td>

								    				        <td>
								    				          <div class="form-group">
								    				              <select class="form-control" name="status[]" style=" width: 200px;" {{($bookingDetails->is_admin_aproved) ? "disabled" : ''}}>
								    				              	<option value="pending" {{ (strtolower($bookingDetails->status) == "pending" ? "selected" : '') }}>Pending</option>
								    				              	<option value="complete" {{ (strtolower($bookingDetails->status) == "complete" ? "selected" : '') }}>Complete</option>
								    				              </select>
								    				          </div>
								    				        </td>
								    			     	</tr>
								    			    @endforeach
								    	     	@endif
								      	<tr class="tr_clone">
									        <td>
									          <div class="form-group">
									              <input type="text" name="name[]" class="form-control name" id="name" placeholder="" >
									          </div>
									        </td>

									        <td>
									          <div class="form-group">
									              <input type="text" name="link[]" class="form-control link" id="link" placeholder="" >
									          </div>
									        </td>

									        <td>
									          <div class="form-group">
									              <input type="text" name="price[]" class="form-control price" id="price" placeholder="" >
									          </div>
									        </td>

									        <td>
									          <div class="form-group">
									              <input type="text" name="offer[]" class="form-control offer" id="offer" placeholder="" >
									          </div>
									        </td>

									        <td>
									          <div class="form-group">
									              <input type="text" name="quantity[]" class="form-control quantity" id="quantity" placeholder="" >
									          </div>
									        </td>		

									        <td>
									          <div class="form-group">
									              <input type="text" name="note[]" class="form-control note" id="note" placeholder="" >
									          </div>
									        </td>

									        <td>
									          <div class="form-group">
									              <select class="form-control" name="status[]" style=" width: 200px;">
									              	<option value="">Select</option>
									              	<option value="pending">Pending</option>
									              	<option value="complete">Complete</option>
									              </select>
									          </div>
									        </td>
								     	</tr>
								    </tbody>
								</table>
							</div>

							<div class="form-group " style="float: right;">
							  <button type="submit" value="save" name="action" class="btn btn-success" style="width: 200px; padding-top: 10px;">Save</button>

							  <button type="submit" value="submit" name="action" class="btn btn-primary" style="width: 200px; padding-top: 10px;">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{asset('js/booking.js')}}"></script>
@endsection