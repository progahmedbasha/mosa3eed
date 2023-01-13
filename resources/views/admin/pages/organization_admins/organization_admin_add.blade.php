@extends('admin.layouts.master')
@section('content')

<div id="content-wrapper">

	<div class="container-fluid pb-0">
		<div class="top-category section-padding mb-4">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Organization Admin</h1>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<form action="{{route('organization_admins.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<input type="hidden" value="{{ $id }}" name="organization_id">
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
								<input type="text" class="form-control" placeholder="Name" value="{{old('name')}}"
									name="name" required />
								@error('name')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputCity">Phone</label>
								<input type="text" class="form-control" id="inputCity" placeholder="Phone"
									value="{{old('phone')}}" name="phone">
								@error('phone')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputEmail4">Email</label>
								<input type="email" class="form-control" id="inputEmail4" placeholder="Email"
									value="{{old('email')}}" name="email">
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
								<h6 class="card-title"><i class="fa fa-list"></i> Type :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputState">User Type</label>
								<select id="inputState" class="form-control" name="user_type_id">
									<option value="">Select User Type</option>
									@foreach($user_types as $item)
									<option value="{{$item->id}}" {{(old('user_type_id')==$item->id)?
										'selected':''}}
										>{{$item->type}}</option>
									@endforeach
								</select>
								@error('user_type_id')
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
								<h6 class="card-title"><i class="fa fa-list"></i> Photo :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputState">Photo</label>
								<div class="col">
									<input type="file" class="custom-file-input" id="validatedCustomFile"
										value="{{old('photo')}}" name="photo">
									<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
									<div class="invalid-feedback">Example invalid custom file feedback</div>
								</div>
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