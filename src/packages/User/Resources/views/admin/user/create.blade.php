@extends('user::admin.layouts.app')
@section('style')
	<style type="text/css">
		.form-body{
			    padding-bottom: 10px;
		}
		.label{
			text-align: right; 
			padding-top: 10px;
		}
	</style>
@endsection
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
				<a href="{{Route('admin.user.index')}}">User</a>
			</li>
			<li class="separator">
				<i class="flaticon-right-arrow"></i>
			</li>
			<li class="nav-item">
					<a href="{{Route('admin.user.create')}}">Create</a>
			</li>
		</ul>
	</div>
	
	@include('user::admin.include.success')
	@include('user::admin.include.error')

		<div class="row justify-content-md-center">
			<div class="col-md-8">
				<div class="card">
					<form action="{{Route('admin.user.create')}}" method="post">
						{{csrf_field()}}
						<div class="card-body shipment-search">
							<div class="row form-body">
							    <div class="col-sm-4">
							      	<div class="label">First Name :</div>
							    </div>
							    <div class="col-sm-6">
							    	<input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
							    </div>
							</div>

							<div class="row form-body">
							    <div class="col-sm-4">
							      	<div class="label">Last Name :</div>
							    </div>
							    <div class="col-sm-6">
							    	<input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
							    </div>
							</div>
							
							<div class="row form-body">
							    <div class="col-sm-4">
							      	<div class="label">E-Mail Address :</div>
							    </div>
							    <div class="col-sm-6">
							    	<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							    </div>
							</div>
							
							<div class="row form-body">
							    <div class="col-sm-4">
							      	<div class="label">Password :</div>
							    </div>
							    <div class="col-sm-6">
							    	<input type="password" class="form-control" name="password" value="{{ old('password') }}">
							    </div>
							</div>
							
							<div class="row form-body">
							    <div class="col-sm-4">
							      	<div class="label">Confirm Password :</div>
							    </div>
							    <div class="col-sm-6">
							    	<input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
							    </div>
							</div>
							
							<div class="row form-body">
							    <div class="col-sm-4">
							      	<div class="label">Balance :</div>
							    </div>
							    <div class="col-sm-6">
							    	<input type="blance" class="form-control" name="blance" value="{{ old('blance') }}">
							    </div>
							</div>
							
							<div class="row form-body">
							    <div class="col-sm-4">
							      	<div class="label">Type :</div>
							    </div>
							    <div class="col-sm-6">
							    	<select class="form-control" name="type">
							    		<option value="">--Select--</option>
							    		<option value="customer">Customer</option>
							    		<option value="shipment">Shipment</option>
							    	</select>
							    </div>
							</div>

							<div class="row form-body">
							    <div class="col-sm-4">
							      	<div class="label">Status :</div>
							    </div>
							    <div class="col-sm-6">
							    	<select class="form-control" name="status">
							    		<option value="1">Active</option>
							    		<option value="0">InActive</option>
							    	</select>
							    </div>
							</div>

							    <div class="col-sm" style="text-align: center;">
							      	<button type="submit" class="btn btn-success submit" id="submit" style="width: 200px;">Submit</button>
							    </div>
						  </div>
					</form>
				</div>
			</div>
		</div>
@endsection

@section('script')

@endsection