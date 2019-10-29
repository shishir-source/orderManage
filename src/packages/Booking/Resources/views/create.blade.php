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
				<a href="#">Booking</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="#">Create</a>
			</li>
		</ul>
	</div>

	<div>
		<div class="card">
			<div class="card-header">
				<div class="card-title">Create</div>
			</div>
			<form action="{{Route('booking.create')}}" method="post">
				{{csrf_field()}}
				<div class="card-body">
					<div class="card">
						<div class="card-body">
							<div class="row">
								@if(auth_user()->type == 'admin')
									<div class="col-md-3">
										<div class="form-group">
											<label>Customer Name</label>
											<input type="text" name="customer_name" class="form-control customer_name" id="customer_name" placeholder="" >
										</div>
									</div>
								@endif

								@if(auth_user()->type == 'admin' || auth_user()->type == 'customer')
									<div class="col-md-3">
										<div class="form-group">
											<label>Date</label>
											<input type="date" name="date" class="form-control date" id="date" placeholder="" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Payment</label>
											<input type="text" name="payment" class="form-control payment" id="payment" placeholder="">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="email2">Payment Reference</label>
											<input type="text" name="payment_reference" class="form-control payment_reference" id="payment_reference" placeholder="">
										</div>
									</div>
								@endif
							</div>
							@if(auth_user()->type == 'admin')
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>BSD Bill</label>
											<input type="text" name="bsd_bill" class="form-control bsd_bill" id="bsd_bill" placeholder="" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Weight Charge</label>
											<input type="text" name="weight_charge" class="form-control weight_charge" id="weight_charge" placeholder="" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Organic Cost</label>
											<input type="text" name="organic_cost" class="form-control organic_cost" id="organic_cost" placeholder="">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="email2">Orgnaic Shipping Cost</label>
											<input type="text" name="orgnaic_shipping_cost" class="form-control orgnaic_shipping_cost" id="orgnaic_shipping_cost" placeholder="">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Order Reference</label>
											<input type="text" name="order_reference" class="form-control order_reference" id="order_reference" placeholder="" >
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Conv Rate</label>
											<input type="text" name="conv_rate" class="form-control conv_rate" id="conv_rate" placeholder="">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Due</label>
											<input type="text" name="due" class="form-control due" id="due" placeholder="">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="email2">Loss/Profit</label>
											<input type="text" name="Loss_or_Profit" class="form-control Loss_or_Profit" id="Loss_or_Profit" placeholder="">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label>Currency Profit</label>
											<input type="text" name="currency_profit" class="form-control currency_profit" id="currency_profit" placeholder="">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Shipping Profit</label>
											<input type="text" name="shipping_profit" class="form-control shipping_profit" id="shipping_profit" placeholder="">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Total Profit</label>
											<input type="text" name="total_profit" class="form-control total_profit" id="total_profit" placeholder="">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="email2">Remarks</label>
											<input type="text" name="remarks" class="form-control remarks" id="remarks" placeholder="">
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
								              <input type="text" name="status[]" class="form-control status" id="status" placeholder="" >
								          </div>
								        </td>
								      </tr>
								    </tbody>
								</table>
							</div>

							<div class="form-group " style="float: right;">
							  <button type="submit" class="btn btn-primary" style="width: 200px; padding-top: 10px;">Save</button>
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