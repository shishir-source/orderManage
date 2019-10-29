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
				{{-- @if(isset($booking->id)) --}}
					{{-- <a href="{{Route('booking.view', $booking->id)}}">Create</a> --}}
				{{-- @else --}}
					<a href="{{Route('shipment.index')}}">Create</a>
				{{-- @endif --}}
			</li>
		</ul>
	</div>
	
	@include('user::admin.include.success')
	@include('user::admin.include.error')

	@if(count($booking) > 0)
		<div class="row justify-content-md-center">
			<div class="col-md-8">
				<div class="card">
					<form action="{{Route('shipment.show')}}" method="post">
						{{csrf_field()}}
						<div class="card-body shipment-search">
							<div class="row">
							    <div class="col-sm">
							      	<div style="text-align: right; padding-top: 10px;">Booking No :</div>
							    </div>
							    <div class="col-sm">
							    	<select class="form-control booking_numbers" multiple="true" name="booking_numbers[]">
							    		@if(isset($booking_numbers))
								    		@foreach($booking_numbers as $booking_number)
								    			<option value="{{$booking_number->booking_id}}">{{$booking_number->booking_id}}</option>
								    		@endforeach
							    		@endif
							    	</select>
							      	{{-- <input type="text" class="form-control booking_number" name="booking_number" id="booking_number" placeholder="Booking No"> --}}
							      	<div class="message"></div>
							    </div>
							    <div class="col-sm">
							      	<button type="submit" class="btn btn-success submit" id="submit" style="width: 200px;">Submit</button>
							    </div>
							</div>
						  </div>
					</form>
				</div>
			</div>
		</div>
	@endif
	@if(count($booking) > 1)
		<div style="padding: 10px">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Shipment</div>
				</div>
				<form action="{{Route('shipment.create')}}" method="post">
				{{-- <form action="{{Route('shipment.create',$booking->id)}}" method="post"> --}}
					{{csrf_field()}}
					<div class="card-body">
						<div class="card">
							<div class="card-body">
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label >Order Id</label>
											<input type="text" class="form-control" readonly="" value="{{isset($booking[0]->booking_id)? $booking[0]->booking_id:''}}" name="booking_number">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Order date</label>
											<input type="text" class="form-control" id="email2" readonly="" value="{{isset($booking[0]->created_at)?$booking[0]->created_at:''}}">
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
						</div>

						<div class="card">
							<div class="card-body">						
								<div class="booking-form-table-body table-responsive">
									<table class="table table-bordered view_table" style="overflow-y: scroll;">
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
									    <tbody>
									    	@if(isset($booking) & count($booking) > 1)
										    	@foreach($booking as $order)
										    		@foreach($order->approvedBookingDetails as $details)
										    			<tr>
										    				<input type="hidden" name="booking_details_id[]" value="{{$details->id}}">

										    				<td>{{$details->name}}</td>
										    				<td>{{$details->link}}</td>
										    				<td>{{$details->price}}</td>
										    				<td>{{$details->offer}}</td>
										    				<td>{{$details->quantity}}</td>
										    				<td>{{$details->note}}</td>
										    				<td>{{$details->status}}</td>
										    			</tr>
										    		@endforeach
										    	@endforeach
									    	@endif									    	
									    </tbody>
									</table>
								</div>

								<div style="float: right; padding-top: 10px;">
									<button type="submit" class="btn btn-success" style="width: 200px;">Submit</button>					
								</div>
							</div>
						</div>

					</div>
				</form>
			</div>
		</div>
	@endif
@endsection

@section('script')
	<script src="{{asset('js/view_page.js')}}"></script>

	<script type="text/javascript">
		$(document).on('click', '.shipment-search .submit' ,function(e){
			var booking_number = $.trim($('.shipment-search .booking_numbers').val());

			// console.log(booking_number);
			// return getMessage(booking_number);
		});

		$(".shipment-search .booking_numbers").select2({
		  placeholder: 'Select an option'
		});
		/**
		 * Working only shipment search
		 * puting error message or success message
		 *
		 * @param string
		 * @return boolen
		 */
		function getMessage(id = null) {
			if(id == '') {
				$('.shipment-search .booking_number').css('border-color','red');
				$('.shipment-search .message').css('color','red');
				$('.shipment-search .message').html('Please enter order no.');

				return false;
			}else{
				return true;
			}
		}
	</script>
@endsection