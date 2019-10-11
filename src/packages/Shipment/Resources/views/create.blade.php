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
				@if(isset($booking->id))
					<a href="{{Route('booking.view', $booking->id)}}">Create</a>
				@else
					<a href="{{Route('shipment.index')}}">Create</a>
				@endif
			</li>
		</ul>
	</div>
	
	@include('user::admin.include.success')
	@include('user::admin.include.error')

	@if(!isset($booking->id))
		<div class="row justify-content-md-center">
			<div class="col-md-8">
				<div class="card">
					<form action="{{Route('shipment.create')}}" method="post">
						{{csrf_field()}}
						<div class="card-body shipment-search">
							<div class="row">
							    <div class="col-sm">
							      	<div style="text-align: right; padding-top: 10px;">Booking No :</div>
							    </div>
							    <div class="col-sm">
							      	<input type="text" class="form-control booking_number" name="booking_number" id="booking_number" placeholder="Booking No">
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
	@if(isset($booking->id))
		<div style="padding: 10px">
			<div class="card">
				<div class="card-header">
					<div class="card-title">Shipment</div>
				</div>
				<form action="{{Route('shipment.create',$booking->id)}}" method="post">
					{{csrf_field()}}
					<div class="card-body">
						<div class="card">
							<div class="card-body">
								
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label >Order Id</label>
											<input type="text" class="form-control" readonly="" value="{{isset($booking->booking_id)? $booking->booking_id:''}}" name="booking_number">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Order date</label>
											<input type="text" class="form-control" id="email2" readonly="" value="{{isset($booking->created_at)?$booking->created_at:''}}">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<labe>Status</label>
											<input type="text" class="form-control" value="" placeholder="Enter Status" name="status">
											{{-- <input type="text" class="form-control" readonly="" value="{{$booking->status}}"> --}}

											{{-- <select class="form-control" name="status"> --}}
												{{-- <option value="">Choose a option</option> --}}
												{{-- <option value="paid">Choose a option</option> --}}
											{{-- </select> --}}
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
								<div class="booking-form-table-body table-responsive">
									<table class="table table-bordered view_table" style="overflow-y: scroll;">
									    <thead>
										    <tr>
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
									    	@if(isset($booking->approvedBookingDetails) & count($booking->approvedBookingDetails) > 0)
									    		@foreach($booking->approvedBookingDetails as $details)
									    			<tr>
									    				<input type="hidden" name="booking_details_id[]" value="{{isset($booking->approvedBookingDetails[0]->id)?$booking->approvedBookingDetails[0]->id:''}}">

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
			var booking_number = $.trim($('.shipment-search .booking_number').val());
			return getMessage(booking_number);
		});

		$(document).on('click', '.shipment-search .booking_number' ,function(e){
			e.preventDefault();

			var options = {
			  url: function(phrase) {
            	return "{{Route('booking.latest')}}";
          	  },
			  getValue: function(element) {
			  	// console.log(element);
            	return element.booking_id;
        	  },
			  list: {
			    match: {
			      enabled: false
			    },
			    onChooseEvent: function(t){
			    	// alert('hhh');
                // console.log($("#page-wrapper .booking_item_code").val());
                // console.log(t);

              }
			  },
			  theme: "square"
			};

			$(".shipment-search .booking_number").easyAutocomplete(options);
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