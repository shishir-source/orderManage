@extends('user::admin.layouts.app')
@section('style')
	
@endsection
@section('content')
	<div class="page-header">
		<h4 class="page-title">User Profile</h4>
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
				<a href="#">User Profile</a>
			</li>
		</ul>
	</div>
	
	@include('user::admin.include.success')
	@include('user::admin.include.error')

		<div class="content">
			<div class="page-inner">
				{{-- <h4 class="page-title">User Profile</h4> --}}
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<form action="{{Route('admin.profile.update',auth_user()->id)}}" method="post">
							{{csrf_field()}}
							<div class="card card-with-nav">
								<div class="card-header">
									<div class="row row-nav-line">
										<ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
											<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
										</ul>
									</div>
								</div>
								<div class="card-body">
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Total Balance</label>
												<input type="text" class="form-control" name="full_name" placeholder="Name" value="{{auth_user()->Balance}}" readonly="">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Name</label>
												<input type="text" class="form-control" name="full_name" placeholder="Name" value="{{auth_user()->first_name}} {{auth_user()->last_name}}" readonly="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Email</label>
												<input type="email" class="form-control" name="email" placeholder="Email" value="{{auth_user()->email}}" readonly="">
											</div>
										</div>
									</div>

									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>First Name</label>
												<input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{auth_user()->first_name}} ">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Last Name</label>
												<input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{auth_user()->last_name}}" >
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Birth Date</label>
												<input type="detae" class="form-control" id="datepicker" name="date_of_birth" value="{{isset($user_details->date_of_birth)?$user_details->date_of_birth:''}}" placeholder="YYYY-MM-DD">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Gender</label>
												<select class="form-control" id="gender" name="gender">
													<option value="1" {{(isset($user_details->gender) && $user_details->gender == 1)?"selected":''}}>Male</option>
													<option value="2" {{(isset($user_details->gender) && $user_details->gender == 2)?"selected":''}}>Female</option>
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Phone</label>
												<input type="text" class="form-control" value="{{isset($user_details->phone)?$user_details->phone:''}}" name="phone" placeholder="Phone">
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-md-12">
											<div class="form-group form-group-default">
												<label>Address</label>
												<input type="text" class="form-control" value="{{isset($user_details->address)?$user_details->address:''}}" name="address" placeholder="Address">
											</div>
										</div>
									</div>
									<div class="text-right mt-3 mb-3">
										<button class="btn btn-success">Save</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</div>
@endsection

@section('script')

@endsection