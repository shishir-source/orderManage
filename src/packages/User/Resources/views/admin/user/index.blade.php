@extends('user::admin.layouts.app')
@section('content')
	<div class="page-header">
		<h4 class="page-title">Settings</h4>
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
				<a href="#">Settings</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
				<a href="{{route('admin.user.index')}}">User</a>
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
					<a href="{{route("admin.user.create")}}"><i class="flaticon-settings"></i></a>
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
							<th>Email</th>
							<th>Role</th>
							<th>Balance</th>
							<th>Status</th>
							<th>Manage</th>
						</tr>
					</thead>
					<tbody>
						@php($i = 1)
						@if(isset($users) && count($users) > 0)
							@foreach($users as $user)
								<tr>
									<th scope="row">{{$i++}}</th>
									<td>{{$user->full_name}}</td>
									<td>{{$user->email}}</td>
									<td>{{$user->type}}</td>
									<td>{{$user->blance}}</td>
									<td>{!!$user->status!!}</td>

									<td>
										<a class="btn btn-primary" href="{{route('admin.user.update',$user->id)}}"> Edit</a>
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

				@if(isset($users) && count($users) > 0)
					{{$users->links()}}
				@endif
			</div>
		</div>
	</div>
@endsection