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
									    	<th width="4%">#</th>
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
								    		@foreach($booking->bookingDetails as $details)
								    			<tr class="{{$details->is_admin_aproved ? 'checked_class' :''}}">
								    				<td>
								    					<input type="checkbox" name="is_admin_aproved[]" class="form-control" id="select_check" value="{{$details->id}}" {{$details->is_admin_aproved ? 'checked disabled' :''}}>
								    				</td>
								    				<td>{{$details->name}}</td>
								    				<td>{{$details->link}}</td>
								    				<td>{{$details->price}}</td>
								    				<td>{{$details->offer}}</td>
								    				<td>{{$details->quantity}}</td>
								    				<td>{{$details->note}}</td>
								    				<td>{{$details->status}}</td>
								    			</tr>
								    		@endforeach
								    	@endif							    	
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