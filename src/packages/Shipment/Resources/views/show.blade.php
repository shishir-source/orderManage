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
				<a href="{{Route('shipment.create',(isset($bookings->id)? $bookings->id : ''))}}">Create</a>
			</li>
		</ul>
	</div>
	
	@include('user::admin.include.success')
	@include('user::admin.include.error')

	@if(count($bookings) == 0 )
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
								    			<option value="{{$booking_number->order_no}}">{{$booking_number->order_no}}</option>
								    		@endforeach
							    		@endif
							    	</select>
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


	@php
		$booking_no = '';
		$order_date = '';
		foreach ($bookings as $booking) {
			$booking_no = implode(", ", [$booking->booking_id]);
			$order_date = implode(", ", [$booking->created_at->format('Y-m-d')]);
		}
	@endphp
	@if(count($bookings) > 0)
		<div style="padding: 10px">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Shipment</div>
				</div>
				<form action="{{Route('shipment.create')}}" method="post">
					{{csrf_field()}}
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
						        	        	<th>Shipment Qty</th>
						        	        	<th>Quantity</th>
									      	</tr>
									    </thead>
									    <tbody>

									    	@foreach($bookings as $details)
									    		
								    			<tr  class="{{! $details->quantity ? 'checked_class' :''}}">
								    				<input name="booking_number[]" type="hidden" value="{{$details->booking->booking_id}}">

								    				<td>
								    					<input type="checkbox" name="is_shipment[]" class="form-control" id="select_check" value="{{$details->id}}" {{! $details->quantity ? 'checked disabled' :''}}>
								    				</td>
								    				<td>
								    					<input name="order_no[]" type="hidden" value="{{$details->order_no}}">
								    					{{$details->order_no}}
								    				</td>
								    				<td>{{$details->name}}</td>
								    				<td>{{$details->link}}</td>
								    				<td>{{$details->price}}</td>
								    				<td>{{$details->offer}}</td>
								    				<td>{{$details->note}}</td>
								    				<td>{{$details->status}}</td>
								    				<td><input type="text" class=" form-control" value="{{$details->shipemnt_qty}}" readonly=""></td>
								    				<td>
								    					<input type="text" name="quantity[]" class=" form-control" value="{{$details->quantity}}">
								    				</td>
								    			</tr>
										    @endforeach	
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