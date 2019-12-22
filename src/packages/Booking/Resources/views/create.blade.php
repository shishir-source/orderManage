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
	<div class="container">
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
					<a href="#">Order</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Create</a>
				</li>
			</ul>
		</div>
		@include('setting::include.error')
		@include('setting::include.success')
		<div>
			<div class="card">
				<div class="card-header">
					<div class="pull-left">
						<div class="card-title">Create</div>
					</div>

					<div class="pull-right">
						<a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Excel Upload</a>
					</div>
				</div>
				<form action="{{Route('booking.store')}}" method="post">
					{{csrf_field()}}
					<div class="card-body">
						<div class="card">
							<div class="card-body">
								<div class="row">
									@if(auth_user()->type == 'admin')
										<div class="col-md-3">
											<div class="form-group">
												<label>Customer Name</label>
												<input type="text" name="customer_name" class="form-control customer_name" id="customer_name" value="{{old('customer_name')}}">
											</div>
										</div>
									@endif

									@if(auth_user()->type == 'admin' || auth_user()->type == 'customer')
										<div class="col-md-3">
											<div class="form-group">
												<label>Date</label>
												<input type="date" name="date" class="form-control date" id="date" value="{{old('date')}}" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Payment</label>
												<input type="text" name="payment" class="form-control payment" id="payment" value="{{old('payment')}}">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="email2">Payment Reference</label>
												<input type="text" name="payment_reference" class="form-control payment_reference" id="payment_reference" value="{{old('payment_reference')}}">
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group" style="padding-top: 35px; ">
												<a class="btn btn-success" href="#" data-toggle="modal" data-target="#payment-modal" style="width: 100%"> Payment</a>
											</div>
										</div>
									@endif
								</div>
								@if(auth_user()->type == 'admin')
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>USD Bill</label>
												<input type="text" name="bsd_bill" class="form-control bsd_bill" id="bsd_bill" value="{{old('bsd_bill')}}" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Weight Charge</label>
												<input type="text" name="weight_charge" class="form-control weight_charge" id="weight_charge" value="{{old('weight_charge')}}" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Organic Cost</label>
												<input type="text" name="organic_cost" class="form-control organic_cost" id="organic_cost" value="{{old('organic_cost')}}">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="email2">Orgnaic Shipping Cost</label>
												<input type="text" name="orgnaic_shipping_cost" class="form-control orgnaic_shipping_cost" id="orgnaic_shipping_cost" value="{{old('orgnaic_shipping_cost')}}">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Order Reference</label>
												<input type="text" name="order_reference" class="form-control order_reference" id="order_reference" value="{{old('order_reference')}}" >
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Conv Rate</label>
												<input type="text" name="conv_rate" class="form-control conv_rate" id="conv_rate" value="{{old('conv_rate')}}">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Due</label>
												<input type="text" name="due" class="form-control due" id="due" value="{{old('due')}}">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="email2">Loss/Profit</label>
												<input type="text" name="loss_or_profit" class="form-control loss_or_profit" id="loss_or_profit" value="{{old('loss_or_profit')}}">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Currency Profit</label>
												<input type="text" name="currency_profit" class="form-control currency_profit" id="currency_profit" value="{{old('currency_profit')}}">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Shipping Profit</label>
												<input type="text" name="shipping_profit" class="form-control shipping_profit" id="shipping_profit" value="{{old('shipping_profit')}}">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Total Profit</label>
												<input type="text" name="total_profit" class="form-control total_profit" id="total_profit" value="{{old('total_profit')}}">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="email2">Remarks</label>
												<input type="text" name="remarks" class="form-control remarks" id="remarks" value="{{old('remarks')}}">
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
									    	@if(isset($excel_data) && count($excel_data) > 0)
									    		@foreach($excel_data as $data)
							    			      	<tr class="tr_clone">
							    				        <td>
							    				          <div class="form-group">
							    				              <input type="text" name="name[]" class="form-control name" id="name" value="{{isset($data['name']) ? $data['name'] : ''}}" >
							    				          </div>
							    				        </td>

							    				        <td>
							    				          <div class="form-group">
							    				              <input type="text" name="link[]" class="form-control link" id="link" value="{{isset($data['link']) ? $data['link'] : ''}}" >
							    				          </div>
							    				        </td>

							    				        <td>
							    				          <div class="form-group">
							    				              <input type="text" name="price[]" class="form-control price" id="price" value="{{isset($data['price']) ? $data['price'] : ''}}" >
							    				          </div>
							    				        </td>

							    				        <td>
							    				          <div class="form-group">
							    				              <input type="text" name="offer[]" class="form-control offer" id="offer" value="{{isset($data['offer']) ? $data['offer'] : ''}}" >
							    				          </div>
							    				        </td>

							    				        <td>
							    				          <div class="form-group">
							    				              <input type="text" name="quantity[]" class="form-control quantity" id="quantity" value="{{isset($data['quantity']) ? $data['quantity'] : ''}}" >
							    				          </div>
							    				        </td>

							    				        <td>
							    				          <div class="form-group">
							    				              <input type="text" name="note[]" class="form-control note" id="note" value="{{isset($data['note']) ? $data['note'] : ''}}" >
							    				          </div>
							    				        </td>

							    				        <td>
							    				          <div class="form-group">
							    				              <select class="form-control" name="status[]" style=" width: 200px;">
							    				              	@php
							    				              		$status_ = isset($data['status']) ? $data['status'] : '';
							    				              	@endphp
							    				              	<option value="pending" {{$status_ == 'pending' ? 'selected' :''}}>Pending</option>
							    				              	<option value="complete" {{$status_ == 'complete' ? 'selected' :''}}>Complete</option>
							    				              </select>
							    				          </div>
							    				        </td>
							    			      	</tr>
									    		@endforeach
									    	@endif
									      	<tr class="tr_clone">
										        <td>
										          <div class="form-group">
										              <input type="text" name="name[]" class="form-control name" id="name" value="{{old('name.*')}}" >
										          </div>
										        </td>

										        <td>
										          <div class="form-group">
										              <input type="text" name="link[]" class="form-control link" id="link" value="{{old('link.*')}}" >
										          </div>
										        </td>

										        <td>
										          <div class="form-group">
										              <input type="text" name="price[]" class="form-control price" id="price" value="{{old('price.*')}}" >
										          </div>
										        </td>

										        <td>
										          <div class="form-group">
										              <input type="text" name="offer[]" class="form-control offer" id="offer" value="{{old('offer.*')}}" >
										          </div>
										        </td>

										        <td>
										          <div class="form-group">
										              <input type="text" name="quantity[]" class="form-control quantity" id="quantity" value="{{old('quantity.*')}}" >
										          </div>
										        </td>

										        <td>
										          <div class="form-group">
										              <input type="text" name="note[]" class="form-control note" id="note" value="{{old('note.*')}}" >
										          </div>
										        </td>

										        <td>
										          <div class="form-group">
										              <select class="form-control" name="status[]" style=" width: 200px;">
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
	</div>

	<div class="modal fade" id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Payment Order</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	        	<div class="col-md-4">
	        		<div class="form-group">
	        			<label for="email2">Total price</label>
	        			<input type="text" name="paid_amount" class="form-control paid_amount" id="paid_amount" value="{{old('customer_name')}}" readonly="true">
	        		</div>
	        	</div>
	        	<div class="col-md-4">
	        		<div class="form-group">
	        			<label for="email2">Paid amount</label>
	        			<input type="text" name="paid_amount" class="form-control paid_amount" id="paid_amount" value="{{old('customer_name')}}" readonly="true">
	        		</div>
	        	</div>
	        	<div class="col-md-4">
	        		<div class="form-group">
	        			<label for="email2">Availabe Balance</label>
	        			<input type="text" name="availabe_balance" class="form-control availabe_balance" id="availabe_balance" value="{{isset(auth_user()->blance) ? auth_user()->blance : ''}}" readonly="true">
	        		</div>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-primary" {{isset(auth_user()->blance) && !empty(auth_user()->blance) ? '' : 'disabled'}}>Payment with Wallet</button>
	        <button class="btn btn-info">Recharge Wallet</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Upload Excel File</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="{{Route('booking.excel_upload')}}" method="post" enctype="multipart/form-data">
	      		@csrf
		      <div class="modal-body">
		        <div class="form-group">
		            <input type="file" name="upload_excel" class="form-control upload_excel" id="upload_excel">

		            <div style="margin-top: 20px; text-decoration: underline;">
		            	<span><a href="{{asset('assets/sample/import_booking.xlsx')}}">Download</a> sample File</span>
		            </div>
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary">Upload File</button>
		      </div>
		    </form>
	    </div>
	  </div>
	</div>
@endsection

@section('script')
	<script src="{{asset('js/booking.js')}}"></script>
@endsection