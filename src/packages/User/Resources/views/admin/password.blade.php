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
						<form action="{{Route('admin.forgot_password.index',auth_user()->id)}}" method="post">
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
												<label>Old Password</label>
												<input type="password" class="form-control" name="old_password">
											</div>
										</div>
										
									</div>
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>New Password</label>
												<input type="password" class="form-control" name="password">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Confirm Password</label>
												<input type="password" class="form-control" name="password_confirmation">
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