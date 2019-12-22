@extends('user::admin.layouts.app')
@section('content')
	<div class="page-header">
		<h4 class="page-title">Draft Order</h4>
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
				<a href="{{Route('booking.draft.index')}}">Draft Order</a>
			</li>
		</ul>
	</div>
	@include('user::admin.include.success')
	@include('user::admin.include.error')
	
	<div class="card">
		<div class="card-header">
			<div class="card-title" style="float: left; width: 50%;">Order</div>
			<div class="card-title" style="float: right; width: 50%;">
				<div style="float: right;">
					<a href="{{route("booking.create")}}"><i class="fas fa-plus"></i></a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Order Id</th>
							<th>Order Date</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php($i = 1)
						@if(count($bookings) > 0)
							@foreach($bookings as $booking)
								<tr>
									<th scope="row">{{$i++}}</th>
									<td>{{$booking->booking_id}}</td>
									<td>{{$booking->created_at->format('d-m-Y')}}</td>
									<td>{!! isset($booking->status)?$booking->status:'' !!}</td>
									<td>
										
										<a class="btn btn-success" href="{{route('booking.draft.edit',$booking->id)}}"> Edit</a>
										<a class="btn btn-danger" href="{{route('booking.draft.destroy',$booking->id)}}">Delete</a>
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

				@if(count($bookings) > 0)
					{{$bookings->links()}}
				@endif
			</div>
		</div>
	</div>
@endsection