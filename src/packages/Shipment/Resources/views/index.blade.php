@extends('user::admin.layouts.app')
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
				<a href="{{route('shipment.index')}}">Shipment</a>
			</li>
		</ul>
	</div>
	@include('user::admin.include.success')
	@include('user::admin.include.error')
	
	<div class="card">
		<div class="card-header">
			<div class="card-title" style="float: left; width: 50%;">Shipment</div>
			<div class="card-title" style="float: right; width: 50%;">
				<div style="float: right;">
					<a href="{{route("shipment.create")}}">Create</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Booking Id</th>
							<th>Name</th>
							<th>Link</th>
							<th>Price</th>
							<th>Offer</th>
							<th>Quantity</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php($i = 1)
						@if(isset($shipments) && count($shipments) > 0)
							@foreach($shipments as $shipment)
								<tr>
									<th scope="row">{{$i++}}</th>
									<td>{{$shipment->booking_number}}</td>

									<td>{{isset($shipment->bookingDetails[0]->name)?$shipment->bookingDetails[0]->name:''}}</td>

									<td>{{isset($shipment->bookingDetails[0]->link)?$shipment->bookingDetails[0]->link:''}}</td>

									<td>{{isset($shipment->bookingDetails[0]->price)?$shipment->bookingDetails[0]->price:''}}</td>

									<td>{{isset($shipment->bookingDetails[0]->offer)?$shipment->bookingDetails[0]->offer:''}}</td>
									
									<td>{{isset($shipment->bookingDetails[0]->quantity)?$shipment->bookingDetails[0]->quantity:''}}</td>

									<td>{{isset($shipment->status)?$shipment->status:''}}</td>

									<td>
										<div class="dropdown">
										    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
										    </button>
										    <div class="dropdown-menu">
										      {{-- <a class="dropdown-item" href="{{route('shipment.edit',$shipment->id)}}"> Edit</a> --}}
										      {{-- <a class="dropdown-item" href="{{route('shipment.view',$shipment->id)}}"> View</a> --}}
										      <a class="dropdown-item" href="{{route('shipment.destroy',$shipment->id)}}">Delete</a>
										    </div>								 
										 </div>
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="25">
									<div style="text-align: center;">Data not found.</div>
								</td>
							</tr>								
						@endif
					</tbody>
				</table>

				@if(isset($shipments) && count($shipments) > 0)
					{{$shipments->links()}}
				@endif
			</div>
		</div>
	</div>
@endsection