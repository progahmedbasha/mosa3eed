@extends('branch_admin.layouts.master')
@section('content')

<div id="content-wrapper">

	<div class="container-fluid pb-0">
		<div class="top-category section-padding mb-4">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New User</h1>
					</div>
				</div>
			</div>
		</div>
		<hr>
		@if(Session::has('success'))
		<script>
			toastr.success(" {{ Session::get('success') }} ");
		</script>
		@endif
		<form action="{{route('branch_admin_profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('patch')
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-list"></i> Contact :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputName">Name</label>
								<input type="text" class="form-control" placeholder="Name" value="{{$user->name}}"
									name="name" required />
								@error('name')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputCity">Phone</label>
								<input type="text" class="form-control" id="inputCity" value="{{$user->phone}}"
									name="phone">
								@error('phone')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputEmail4">Email</label>
								<input type="email" class="form-control" id="inputEmail4" placeholder="Email"
									value="{{$user->email}}" name="email">
								@error('email')
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
								<h6 class="card-title"><i class="fa fa-list"></i> Password :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputPassword4">Password</label>
								<input type="password" class="form-control" id="inputPassword4" placeholder="Password"
									value="{{old('password')}}" name="password">
								@error('password')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputPassword4">Re-Password</label>
								<input type="password" class="form-control" id="inputPassword4"
									placeholder="Re-Enter Password" value="{{old('re-password')}}" name="re-password">
								@error('password')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<br><br><br>

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
								<h6 class="card-title"><i class="fa fa-list"></i> Address :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputState">Country</label>
								<select id="country-dd" class="form-control" name="country_id">

									<option value="">Select Country</option>
									@foreach ($countries as $country)
									<option value="{{$country->id}}" {{($country_id=$country)? 'selected' : '' }}>
										{{$country->name}}
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
									<option {{($city_id=$city_id)? 'selected' : '' }}> {{$city_id->name}}</option>
								</select>
								@error('city_id')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">District</label>
								<select id="state-dd" class="form-control" name="district_id">
									<option value="{{$user->district_id}}" {{($user->district_id ==
										$user->district_id)?
										'selected' : '' }}> {{$user->District->name}}</option>
								</select>
								@error('district_id')
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
								<h6 class="card-title"><i class="fa fa-list"></i> Setting :</h6>
								<hr>
							</div>
							<div class="row">
								@if(!empty($user->photo))
								<img src="{{url('/data/admins')}}/{{$user->photo }}" class="w3-round" width="15%"
									alt="Norway">
								@else
								<img src="{{url('/data/error.png')}}" class="w3-round" width="15%" alt="Norway">
								@endif
								<div class="col">
									<label for="inputState">Photo</label>
									<div class="col">
										<input type="file" class="custom-file-input" id="validatedCustomFile"
											value="{{old('photo')}}" name="photo">
										<label class="custom-file-label" for="validatedCustomFile">Choose
											file...</label>
										<div class="invalid-feedback">Example invalid custom file feedback</div>
									</div>
								</div>
							</div>
							<br><br><br><br><br>
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