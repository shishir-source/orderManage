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
								<div class="col-md-3">
									<div class="form-group">
										<label>Order date</label>
										<input type="text" class="form-control" placeholder="MM/DD/YYYY" name="order_date" value="{{carbon\carbon::today()->format('m-d-Y')}}" readonly="">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Status</label>
										<input type="text" class="form-control" id="status" placeholder="Enter Status" name="status">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Date of Purchase</label>
										<input type="date" class="form-control date_of_purchase" id="date_of_purchase" placeholder="MM/DD/YYYY" name="date_of_purchase">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="email2">label 4</label>
										<input type="email" class="form-control" id="email2" placeholder="Enter Email">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="email2">label 1</label>
										<input type="email" class="form-control" id="email2" placeholder="Enter Email">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="email2">label 1</label>
										<input type="email" class="form-control" id="email2" placeholder="Enter Email">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="email2">label 1</label>
										<input type="email" class="form-control" id="email2" placeholder="Enter Email">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card">
						<div class="card-body">
							<div class="booking-form-table-body table-responsive" style="height: 400px;">
								<table class="table table-bordered " style="overflow-y: scroll;" id="filed_increment">
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
								    <tbody class="idclone" >
								      <tr class="tr_clone">
								        <td>
								          <div class="form-group">
								              <input type="text" name="customer_name[]" class="form-control customer_name" id="customer_name" placeholder="" >
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								              <input type="date" name="date_of_purchase[]" class="form-control date_of_purchase" id="date_of_purchase" placeholder="" >
								          </div>
								        </td>

								        <td>
								          <div class="form-group ">
								              <input type="text" name="purchasing_websites[]" class="form-control purchasing_websites" id="purchasing_websites" placeholder="">
								            </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="items_order[]" class="form-control items_order" id="items_order" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="status[]" class="form-control status" id="status" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="order_value[]" class="form-control order_value" id="order_value" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="conv_rate[]" class="form-control conv_rate" id="conv_rate" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="currency_bill[]" class="form-control currency_bill" id="currency_bill" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="organic_currency_cost[]" class="form-control organic_currency_cost" id="organic_currency_cost" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="shipping_rate[]" class="form-control shipping_rate" id="shipping_rate" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="shipping_weight_g[]" class="form-control shipping_weight_g" id="shipping_weight_g" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="shipping_bill[]" class="form-control shipping_bill" id="shipping_bill" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="orgnaic_shipping_cost[]" class="form-control orgnaic_shipping_cost" id="orgnaic_shipping_cost" placeholder="">
								          </div>
								        </td>


								        <td>
								          <div class="form-group">
								            <input type="text" name="customer_paid[]" class="form-control customer_paid" id="customer_paid" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="payment_method[]" class="form-control payment_method" id="payment_method" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="payment_reference[]" class="form-control payment_reference" id="payment_reference" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="due[]" class="form-control due" id="due" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="loss_or_disc[]" class="form-control loss_or_disc" id="loss_or_disc" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="total_cost[]" class="form-control total_cost" id="total_cost" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="currency_profit[]" class="form-control currency_profit" id="currency_profit" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="shipping_profit[]" class="form-control shipping_profit" id="shipping_profit" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="total_profit[]" class="form-control total_profit" id="total_profit" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="remarks[]" class="form-control remarks" id="remarks" placeholder="">
								          </div>
								        </td>

								        <td>
								          <div class="form-group">
								            <input type="text" name="shipment_no[]" class="form-control shipment_no" id="shipment_no" placeholder="">
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