@extends('user::admin.layouts.app')
@section('style')
	<style type="text/css">
		.booking-form-table-body table > tbody > tr > td{
			    padding: 10px !important;
			    width: 160px;
		}
		.checked_class {
			background-color:#C4d1FF;
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
				<a href="{{Route('booking.index')}}">Order</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="{{Route('booking.view',$booking->id)}}">Details</a>
			</li>
		</ul>
	</div>
	
	@include('user::admin.include.success')
	@include('user::admin.include.error')

	<div style="padding: 10px">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Order Details</div>
			</div>

			<form action="{{Route('booking.view',$booking->id)}}" method="post">
				{{csrf_field()}}
				<div class="card-body">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label >Order No</label>
										<input type="text" class="form-control" id="email2" readonly="" value="{{$booking->booking_id}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Order date</label>
										<input type="text" class="form-control" id="email2" readonly="" value="{{$booking->created_at->format('Y-m-d')}}">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<labe>Status</label>
										<input type="text" class="form-control" readonly="" value="{{$booking->status}}">
									</div>
								</div>
							</div>

							<div class="row">
								@if(auth_user()->type == 'admin')
									<div class="col-md-3">
										<div class="form-group">
											<label>Customer Name</label>
											<input type="text" name="customer_name" class="form-control customer_name" id="customer_name" placeholder="" value="{{(isset($booking->customer_name)? $booking->customer_name : '')}}">
										</div>
									</div>
								@endif

								@if(auth_user()->type == 'admin' || auth_user()->type == 'customer')
									<div class="col-md-3">
										<div class="form-group">
											<label>Date</label>
											<input type="date" name="date" class="form-control date" id="date" value="{{(isset($booking->date)? $booking->date : '')}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Payment</label>
											<input type="text" name="payment" class="form-control payment" id="payment" value="{{(isset($booking->payment)? $booking->payment : '')}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="email2">Payment Reference</label>
											<input type="text" name="payment_reference" class="form-control payment_reference" id="payment_reference" value="{{(isset($booking->payment_reference)? $booking->payment_reference : '')}}">
										</div>
									</div>
								@endif
							</div>
							@if(auth_user()->type == 'admin')
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>USD Bill</label>
											<input type="text" name="bsd_bill" class="form-control bsd_bill" id="bsd_bill" placeholder="" value="{{(isset($booking->bsd_bill)? $booking->bsd_bill : '')}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Weight Charge</label>
											<input type="text" name="weight_charge" class="form-control weight_charge" id="weight_charge" placeholder="" value="{{(isset($booking->weight_charge)? $booking->weight_charge : '')}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Organic Cost</label>
											<input type="text" name="organic_cost" class="form-control organic_cost" id="organic_cost" placeholder="" value="{{(isset($booking->organic_cost)? $booking->organic_cost : '')}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="email2">Orgnaic Shipping Cost</label>
											<input type="text" name="orgnaic_shipping_cost" class="form-control orgnaic_shipping_cost" id="orgnaic_shipping_cost" placeholder="" value="{{(isset($booking->orgnaic_shipping_cost)? $booking->orgnaic_shipping_cost : '')}}">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Order Reference</label>
											<input type="text" name="order_reference" class="form-control order_reference" id="order_reference" placeholder="" value="{{(isset($booking->order_reference)? $booking->order_reference : '')}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Conv Rate</label>
											<input type="text" name="conv_rate" class="form-control conv_rate" id="conv_rate" placeholder="" value="{{(isset($booking->conv_rate)? $booking->conv_rate : '')}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Due</label>
											<input type="text" name="due" class="form-control due" id="due" placeholder="" value="{{(isset($booking->due)? $booking->due : '')}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="email2">Loss/Profit</label>
											<input type="text" name="loss_or_profit" class="form-control loss_or_profit" id="loss_or_profit" placeholder="" value="{{(isset($booking->loss_or_profit)? $booking->loss_or_profit : '')}}">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Currency Profit</label>
											<input type="text" name="currency_profit" class="form-control currency_profit" id="currency_profit" placeholder="" value="{{(isset($booking->currency_profit)? $booking->currency_profit : '')}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Shipping Profit</label>
											<input type="text" name="shipping_profit" class="form-control shipping_profit" id="shipping_profit" placeholder="" value="{{(isset($booking->shipping_profit)? $booking->shipping_profit : '')}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Total Profit</label>
											<input type="text" name="total_profit" class="form-control total_profit" id="total_profit" placeholder="" value="{{(isset($booking->total_profit)? $booking->total_profit : '')}}">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="email2">Remarks</label>
											<input type="text" name="remarks" class="form-control remarks" id="remarks" placeholder="" value="{{(isset($booking->remarks)? $booking->remarks : '')}}">
										</div>
									</div>
								</div>
							@endif
						</div>
					</div>

					<div class="card">
						<div class="card-body">
							<div class="booking-form-table-body table-responsive">
								<table class="table table-bordered view_table" style="overflow-y: scroll;">
								    <thead>
									    <tr>
									    	<th width="4%">#</th>
									    	@if(auth_user()->type == 'admin')
									    		<th width="20%">Order No</th>
									    	@endif
									    	<th>Name</th>
								        	<th>Link</th>
								        	<th>Price</th>
								        	<th>Offer</th>
								        	<th>Quantity</th>
								        	<th>Note</th>
								        	<th>Status</th>
								      	</tr>
								    </thead>
								    <tbody>
								    	@if(isset($booking->bookingDetails) & count($booking->bookingDetails) > 0)
								    		@php($j = 1)
								    		@foreach($booking->bookingDetails as $details)
								    			@if(strtolower($details->status) == "complete")
									    			<tr class="{{$details->is_admin_aproved ? 'checked_class' :''}}">

									    				@if(auth_user()->type == 'admin')
										    				<td>
										    					<input type="checkbox" name="is_admin_aproved[]" class="form-control" id="select_check" value="{{$details->id}}" {{$details->is_admin_aproved ? 'checked disabled' :''}}>
										    				</td>

										    				<td>
										    					<input type="text" name="order_no[]" class="form-control" value="{{(isset($details->order_no)? $details->order_no : '')}}" {{((isset($details->order_no) && !empty($details->order_no))? "disabled" : '')}}>
										    				</td>
										    			@elseif(auth_user()->type == 'customer')
										    				<td>{{$j++}}</td>
										    			@endif
									    				<td>{{$details->name}}</td>
									    				<td>{{$details->link}}</td>
									    				<td>{{$details->price}}</td>
									    				<td>{{$details->offer}}</td>
									    				<td>{{$details->quantity}}</td>
									    				<td>{{$details->note}}</td>
									    				<td>{!!$details->status!!}</td>
									    			</tr>
									    		@endif
								    		@endforeach
								    	@endif							    	
								    </tbody>
								</table>
							</div>

							@if(auth_user()->type == 'admin')
								<div style="float: right; padding-top: 10px;">
									<button type="submit" class="btn btn-success" style="width: 200px;">Submit</button>					
								</div>
							@endif
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{asset('js/view_page.js')}}"></script>
@endsection