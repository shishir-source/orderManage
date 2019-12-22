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
				<a href="#">Order</a>
			</li>
		</ul>
	</div>
	<div class="card">
		<div class="card-header">
			<div class="card-title" style="float: left; width: 50%;">Order</div>
			<div class="card-title" style="float: right; width: 50%;">
				<div style="float: right;">
					<a href="{{route("booking.create")}}">Create</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Link</th>
							<th>Price</th>
							<th>Offer</th>
							<th>QTY</th>
							<th>Note</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row">1</th>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>
								<div class="dropdown">
								    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Edit
								    </button>
								    <div class="dropdown-menu">
								      <a class="dropdown-item" href="{{route('booking.view')}}"> View</a>
								      <a class="dropdown-item" href="#">Delete</a>
								    </div>								 
								 </div>
							</td>
						</tr>
						<tr>
							<th scope="row">2</th>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>
								<div class="dropdown">
								    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Edit
								    </button>
								    <div class="dropdown-menu">
								      <a class="dropdown-item" href="{{route('booking.view')}}"> View</a>
								      <a class="dropdown-item" href="#">Delete</a>
								    </div>								 
								 </div>
							</td>
						</tr>
						<tr>
							<th scope="row">3</th>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>Table cell</td>
							<td>
								<div class="dropdown">
								    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Edit
								    </button>
								    <div class="dropdown-menu">
								      <a class="dropdown-item" href="{{route('booking.view')}}"> View</a>
								      <a class="dropdown-item" href="#">Delete</a>
								    </div>								 
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection