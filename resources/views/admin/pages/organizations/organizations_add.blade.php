@extends('admin.layouts.master')
@section('content')

<div id="content-wrapper">

	<div class="container-fluid pb-0">
		<div class="top-category section-padding mb-4">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Organization</h1>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<form action="{{route('organizations.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-list"></i> Name :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputName">Name En</label>
								<input type="text" class="form-control" placeholder="Name En" value="{{old('name_en')}}"
									name="name_en" required />
								@error('name_en')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputName">Name Ar</label>
								<input type="text" class="form-control form-control-solid" placeholder="Name Ar"
									value="{{old('name_ar')}}" name="name_ar">
								@error('name_ar')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-list"></i> Contact :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputEmail4">Contact Email</label>
								<input type="email" class="form-control" id="inputEmail4" placeholder="Email"
									value="{{old('email')}}" name="email">
								@error('email')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">Phone</label>
								<input type="text" class="form-control form-control-solid" placeholder="Phone"
									value="{{old('phone')}}" name="phone">
								@error('phone')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>

						</div>
					</div>
				</div>
			</div>
			<br>
			{{-- end of row --}}
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-list"></i> Contact Details :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputName">Contact</label>
								<input type="text" class="form-control form-control-solid" placeholder="Contact"
									value="{{old('contact_name')}}" name="contact_name">
								@error('contact_name')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputName">Bio</label>
								<input type="text" class="form-control form-control-solid" placeholder="Bio"
									value="{{old('bio')}}" name="bio">
								@error('bio')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">Type</label>
								<select class="form-control" name="type">
									<option value="">Select Type</option>
									<option value="Pharmacy">Pharmacy</option>
									<option value="Store">Store</option>
								</select>
								@error('type')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">Verified Status</label>
								<select class="form-control" name="status">
									<option value="">Select Status</option>
									<option value="Verified">Verified</option>
									<option value="Not Verified">Not Verified</option>
								</select>
								@error('status')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-globe"></i> Address :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputState">Country</label>
								<select id="country-dd" class="form-control" name="country_id">
									<option value="">Select Country</option>
									@foreach ($countries as $data)
									<option value="{{$data->id}}">
										{{$data->name}}
									</option>
									@endforeach
								</select>
								@error('country_id')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">City</label>
								<select id="city-dd" class="form-control" name="city_id">
								</select>
								@error('city_id')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">District</label>
								<select id="state-dd" class="form-control" name="district_id">
								</select>
								@error('district_id')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">Address</label>
								<input type="text" class="form-control form-control-solid" placeholder="Address"
									value="{{old('address')}}" name="address">
								@error('address')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>

						</div>
					</div>
				</div>

			</div>
			<br>
			{{-- end of row --}}
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-image"></i> Photo :</h6>
								<hr>
							</div>
							<div class="col">
								<label class="form-label" for="customFile">Photo</label>
								<input type="file" class="form-control" id="customFile" />
							</div>
						</div>
					</div>
				</div>

			</div>
			<br>
			{{-- end of row --}}
			<hr>

			{{-- start new body for add owner details --}}
			<div class="top-category section-padding mb-4">
				<div class="row">
					<div class="col-md-12">
						<div class="main-title">
							<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add Owner Details</h1>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<label for="inputName">Name </label>
									<input type="text" class="form-control" placeholder="Name "
										value="{{old('owner_name')}}" name="owner_name" required />
									@error('owner_name')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<label for="inputName">Phone</label>
									<input type="text" class="form-control form-control-solid" placeholder="Phone"
										value="{{old('owner_phone')}}" name="owner_phone">
									@error('owner_phone')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<label for="inputName">Email</label>
									<input type="email" class="form-control form-control-solid" placeholder="Email"
										value="{{old('owner_email')}}" name="owner_email">
									@error('owner_email')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<hr>
			{{-- start new body for add emlpoyee details --}}
			<div class="top-category section-padding mb-4">
				<div class="row">
					<div class="col-md-12">
						<div class="main-title">
							<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Employee</h1>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<label for="inputName">Name </label>
									<input type="text" class="form-control" placeholder="Name "
										value="{{old('employee_name')}}" name="employee_name">
									@error('employee_name')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<label for="inputName">Phone</label>
									<input type="text" class="form-control form-control-solid" placeholder="Phone"
										value="{{old('employee_phone')}}" name="employee_phone">
									@error('employee_phone')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<hr>
			{{-- start new body for add Branch details --}}
			<div class="top-category section-padding mb-4">
				<div class="row">
					<div class="col-md-12">
						<div class="main-title">
							<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Branch</h1>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-list"></i> Name :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputName">Name En</label>
								<input type="text" class="form-control" placeholder="Name En"
									value="{{old('branch_name_en')}}" name="branch_name_en" >
								@error('branch_name_en')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputName">Name Ar</label>
								<input type="text" class="form-control form-control-solid" placeholder="Name Ar"
									value="{{old('branch_name_ar')}}" name="branch_name_ar">
								@error('branch_name_ar')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-phone"></i> Phone :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputName">Phone 1</label>
								<input type="text" class="form-control" placeholder="Phone 1"
									value="{{old('branch_phone_1')}}" name="branch_phone_1" />
								@error('branch_phone_1')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputName">Phone 2</label>
								<input type="text" class="form-control" placeholder="Phone 2"
									value="{{old('branch_phone_2')}}" name="branch_phone_2" >
								@error('branch_phone_2')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>

						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-list"></i> Contact :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputName">Email</label>
								<input type="email" class="form-control" placeholder="Email"
									value="{{old('branch_email')}}" name="branch_email" />
								@error('branch_email')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputName">Address</label>
								<input type="text" class="form-control form-control-solid" placeholder="Address"
									value="{{old('branch_address')}}" name="branch_address">
								@error('branch_address')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>

			<button type="submit" class="btn btn-primary">Save</button>
		</form>

		<hr>
	</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@include('admin.pages.component.country_city_district')
@endsection