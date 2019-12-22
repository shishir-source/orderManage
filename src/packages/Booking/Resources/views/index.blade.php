@extends('user::admin.layouts.app')
@section('content')
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
				<a href="{{Route('booking.index')}}">Order</a>
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
								@if(isset($booking->bookingDetails))
									@foreach($booking->bookingDetails as $bookingDetails)
										@if(strtolower($bookingDetails->status) == 'complete')
											<tr>
												<th scope="row">{{$i++}}</th>
												<td>{{$booking->booking_id}}</td>
												<td>{{$booking->created_at->format('d-m-Y')}}</td>
												<td>{!! isset($booking->status)?$booking->status:'' !!}</td>
												<td>
													
													<a class="btn btn-success" href="{{route('booking.view',$booking->id)}}"> View</a>
													@if(auth_user()->type == 'customer')
														<a class="btn btn-success" href="#" data-toggle="modal" data-target="#payment-modal"> Payment</a>
													@endif

													<a class="btn btn-danger" href="{{route('booking.destroy',$booking->id)}}">Delete</a>
												</td>
											</tr>
											@break
										@endif
									@endforeach
								@endif
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

				<!-- Modal -->
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
				        ...
				      </div>
				      <div class="modal-footer">
				        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
				        <button type="button" class="btn btn-primary">Payment</button>
				      </div>
				    </div>
				  </div>
				</div>

				@if(count($bookings) > 0)
					{{$bookings->links()}}
				@endif
			</div>
		</div>
	</div>
@endsection