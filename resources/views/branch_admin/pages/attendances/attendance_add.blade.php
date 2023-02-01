@extends('branch_admin.layouts.master')
@section('content')

<div id="content-wrapper">
	<div class="container-fluid pb-0">
		<div class="top-category section-padding mb-4">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add Attendance</h1>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-xl-12 mb-30">
				<div class="card card-statistics h-100">
					<div class="card-body">
						<div class="row">
							<h5 class="card-title">Form Shift Add</h5>
						</div>
						<form action="{{route('attendances.store')}}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" value="{{ $id }}" name="branch_id">
							<div class="form-row">
								<div class="col">
									<label for="inputName">User</label>
									<select id="country-dd" class="form-control" name="user_id">
										<option value="">Select Users</option>
										@foreach ($users as $user)
										<option value="{{$user->id}}" {{(old('user_id')==$user->id)?
											'selected':''}}>{{$user->name}}</option>
										@endforeach
									</select>
									@error('user_id')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<label for="inputName">Type</label>
									<select id="country-dd" class="form-control" name="type">
										<option value="">Select Type</option>
										<option value="Check In">Check In</option>
										<option value="Check Out">Check Out</option>
									</select>
									@error('type')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<br>

							<button type="submit" class="btn btn-primary">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<hr>
	</div>
</div>
</div>
@endsection