@extends('user::admin.layouts.app')
@section('style')
	
@endsection
@section('content')
	<div class="page-header">
		<h4 class="page-title">Shipment</h4>
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
				<a href="{{Route('shipment.index')}}">Shipment</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="{{Route('shipment.create')}}">Create</a>
			</li>
		</ul>
	</div>
	
	@include('user::admin.include.success')
	@include('user::admin.include.error')

	<div style="padding: 10px">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Shipment</div>
			</div>
			<div class="card-body">
				{{-- <div class="card">
					<div class="card-body">
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label >Booking No</label>
									<input type="text" class="form-control" readonly="" value="{{isset($booking_no)? $booking_no:''}}" name="booking_number">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Order date</label>
									<input type="text" class="form-control" id="email2" readonly="" value="{{isset($order_date)? $order_date :''}}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<labe>Status</label>
									<input type="text" class="form-control" value="" placeholder="Enter Status" name="status">
								</div>
							</div>
						</div>
					</div>
				</div> --}}

				<div class="card">
					<div class="card-body">						
						<div class="booking-form-table-body table-responsive">
							<table class="table table-bordered view_table" style="overflow-y: scroll;">
							    <thead>
								    <tr>
								    	<th width="4%">#</th>
								    	<th>Order No</th>
				        		    	<th>Name</th>
				        	        	<th>Link</th>
				        	        	<th>Price</th>
				        	        	<th>Offer</th>
				        	        	<th>Note</th>
				        	        	<th>Status</th>
				        	        	<th>Quantity</th>
							      	</tr>
							    </thead>
							    <tbody>
							    	@if(count($shipments) > 0)
							    		@php($j =1)
								    	@foreach($shipments as $details)
							    			<tr>
							    				<td>{{$j++}}</td>
							    				<td>{{$details->order_no}}</td>
							    				<td>{{$details->bookingDetails->name}}</td>
							    				<td>{{$details->bookingDetails->link}}</td>
							    				<td>{{$details->bookingDetails->price}}</td>
							    				<td>{{$details->bookingDetails->offer}}</td>
							    				<td>{{$details->bookingDetails->note}}</td>
							    				<td>{{$details->status}}</td>
							    				<td>{{$details->quantity}}</td>
							    			</tr>
									    @endforeach
									@else
										<tr>
											<td colspan="20">
												<div style="text-align: center;font-weight: 600;"> Data not found.</div>
											</td>
										</tr>
								    @endif
							    </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
@endsection

@section('script')

@endsection