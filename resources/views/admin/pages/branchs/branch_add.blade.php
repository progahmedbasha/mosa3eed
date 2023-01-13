@extends('admin.layouts.master')
@section('content')

<div id="content-wrapper">

	<div class="container-fluid pb-0">
		<div class="top-category section-padding mb-4">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Branch</h1>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<form action="{{route('branchs.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<input type="hidden" value="{{ $id }}" name="organization_id">
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
									name="name_en">
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
								<h6 class="card-title"><i class="fa fa-list"></i> Phone :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputName">Phone 1</label>
								<input type="text" class="form-control" placeholder="Phone 1" value="{{old('phone_1')}}"
									name="phone_1" />
								@error('phone_1')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputName">Phone 2</label>
								<input type="text" class="form-control" placeholder="Phone 2" value="{{old('phone_2')}}"
									name="phone_2">
								@error('phone_2')
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
								<h6 class="card-title"><i class="fa fa-list"></i> Contact :</h6>
								<hr>
							</div>
						
								<div class="col">
									<label for="inputName">Email</label>
									<input type="email" class="form-control" placeholder="Email"
										value="{{old('email')}}" name="email" />
									@error('email')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<label for="inputName">Address</label>
									<input type="text" class="form-control form-control-solid" placeholder="Address"
										value="{{old('address')}}" name="address">
									@error('address')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<label class="form-label" for="customFile">Photo</label>
									<input type="file" class="form-control" id="customFile" />
								</div>
						</div>
					</div>
				</div>
				{{-- // --}}
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-list"></i> Address :</h6>
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
						</div>
					</div>
				</div>

				{{-- // --}}
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