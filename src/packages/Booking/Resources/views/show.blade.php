@extends('user::admin.layouts.app')
@section('style')
	<style type="text/css">
		.booking-form-table-body table > tbody > tr > td{
			    padding: 10px !important;
			    width: 160px;
		}
	</style>
@endsection
@section('content')
	<div class="page-header">
		<h4 class="page-title">Booking</h4>
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
				<a href="{{Route('booking.index')}}">Booking</a>
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
				<div class="card-title">Booking Details</div>
			</div>
			<div class="card-body">
				<div class="card">
					<div class="card-body">

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label >Order Id</label>
								<input type="text" class="form-control" id="email2" readonly="" value="{{$booking->booking_id}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Order date</label>
								<input type="text" class="form-control" id="email2" readonly="" value="{{$booking->created_at}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<labe>Status</label>
								<input type="text" class="form-control" readonly="" value="{{$booking->status}}">
							</div>
						</div>
					</div>

					{{-- <div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Client Name</label>
								<input type="test" class="form-control" id="email2" placeholder="Client Name">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Payment</label>
								<input type="text" class="form-control" id="email2" placeholder="Payment">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>BSD Bill</label>
								<input type="text" class="form-control" id="email2" placeholder="BSD Bill">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Weight Charge</label>
								<input type="text" class="form-control" id="email2" placeholder="Weight Charge">
							</div>
						</div>
					</div> --}}

					{{-- <div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Cost Rate</label>
								<input type="test" class="form-control" id="email2" placeholder="Cost Rate">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Payment Ref</label>
								<input type="text" class="form-control" id="email2" placeholder="Payment Ref">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Due</label>
								<input type="text" class="form-control" id="email2" placeholder="Due">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Loss / Profite</label>
								<input type="email" class="form-control" id="email2" placeholder="Loss / Profite">
							</div>
						</div>
					</div> --}}

					{{-- <div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Care / Profit</label>
								<input type="test" class="form-control" id="email2" placeholder="Care / Profite">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Shiping / Profit</label>
								<input type="text" class="form-control" id="email2" placeholder="Shiping / Profite">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Total / Profit</label>
								<input type="text" class="form-control" id="email2" placeholder="Total / Profite">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label>Remarks</label>
								<input type="text" class="form-control" id="email2" placeholder="Remarks">
							</div>
						</div>
					</div> --}}
					</div>
				</div>

				<div class="card">
					<div class="card-body">

						<form action="{{Route('booking.view',$booking->id)}}" method="post">
							{{csrf_field()}}
							<div class="booking-form-table-body table-responsive">
								<table class="table table-bordered view_table" style="overflow-y: scroll;">
								    <thead>
									    <tr>
									    	<th>#</th>
								        	<th>Customer Name</th>
								        	<th>Date of Purchase</th>
											<th>Purchasing websites</th>
											<th>Items/order</th>
											<th>Status</th>
											<th>Order Value</th>
											<th>Conv Rate</th>
											<th>Currency Bill</th>
									        <th>Organic Currency Cos</th>
									        <th>Shipping Rate</th>
									        <th>Shipping weight (g)</th>
									        <th>Shipping bill</th>
									        <th>Orgnaic Shipping Cost</th>
									        <th>Customer Paid</th>
									        <th>Payment Method</th>
									        <th>Payment Reference</th>
									        <th>Due</th>
									        <th>Loss or Disc</th>
									        <th>Total Cost</th>
									        <th>Currency Profit</th>
									        <th>Shipping Profit</th>
									        <th>Total Profit</th>
									        <th>Remarks</th>
									        <th>Shipment No</th>
								      	</tr>
								    </thead>
								    <tbody>
								    	@if(isset($booking->bookingDetails) & count($booking->bookingDetails) > 0)
								    		@foreach($booking->bookingDetails as $details)
								    			<tr>
								    				<td>
								    					<input type="checkbox" name="is_admin_aproved[]" class="form-control" id="select_check" value="{{$details->id}}" {{$details->is_admin_aproved ? 'checked disabled' :''}}>
								    				</td>
								    				<td>{{$details->customer_name}}</td>
								    				<td>{{$details->date_of_purchase}}</td>
								    				<td>{{$details->purchasing_websites}}</td>
								    				<td>{{$details->items_order}}</td>
								    				<td>{{$details->status}}</td>
								    				<td>{{$details->order_value}}</td>
								    				<td>{{$details->conv_rate}}</td>
								    				<td>{{$details->currency_bill}}</td>
								    				<td>{{$details->organic_currency_cost}}</td>
								    				<td>{{$details->shipping_rate}}</td>
								    				<td>{{$details->shipping_weight_g}}</td>
								    				<td>{{$details->shipping_bill}}</td>
								    				<td>{{$details->orgnaic_shipping_cost}}</td>
								    				<td>{{$details->shipping_weight_g}}</td>
								    				<td>{{$details->shipping_bill}}</td>
								    				<td>{{$details->orgnaic_shipping_cost}}</td>
								    				<td>{{$details->due}}</td>
								    				<td>{{$details->loss_or_disc}}</td>
								    				<td>{{$details->total_cost}}</td>
								    				<td>{{$details->currency_profit}}</td>
								    				<td>{{$details->shipping_profit}}</td>
								    				<td>{{$details->total_profit}}</td>
								    				<td>{{$details->remarks}}</td>
								    				<td>{{$details->shipment_no}}</td>
								    			</tr>
								    		@endforeach
								    	@endif

								    	{{-- <tr>
								    		<td>
								    			<input type="checkbox" name="" class="form-control" id="select_check">
								    		</td>
								    		<td>Label 1</td>
								    		<td>Label 1</td>
								    		<td>Label 1</td>
								    		<td>Label 1</td>
								    		<td>Label 1</td>
								    		<td>Label 1</td>
								    	</tr> --}}
								    	
								    </tbody>
								</table>
							</div>

							<div style="float: right; padding-top: 10px;">
								<button type="submit" class="btn btn-success" style="width: 200px;">Submit</button>					
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
@endsection

@section('script')
	<script src="{{asset('js/view_page.js')}}"></script>
@endsection