@extends('admin.layouts.master')
@section('content')

<div id="content-wrapper">
	<div class="container-fluid pb-0">
		<div class="top-category section-padding mb-4">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Shift</h1>
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
						<form action="{{route('organization_shifts.store')}}" method="post"
							enctype="multipart/form-data">
							@csrf
							<div class="form-row">
								<div class="col">
									<label for="inputName">Organization</label>
									<select id="country-dd" class="form-control" name="organization_id">
										<option value="">Select Organization</option>
										@foreach ($organizations as $org)
										<option value="{{$org->id}}" {{(old('organization_id')==$org->id)?
											'selected':''}}>{{$org->name}}</option>
										@endforeach
									</select>
									@error('organization_id')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<label for="inputName">Branch</label>
									<select id="country-dd" class="form-control" name="branch_id">
										<option value="">Select Branches</option>
										@foreach ($branches as $branch)
										<option value="{{$branch->id}}" {{(old('branch_id')==$branch->id)?
											'selected':''}}>{{$branch->name}}</option>
										@endforeach
									</select>
									@error('branch_id')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<br>
							<div class="form-row">
								<div class="col">
									<label for="inputName">Shift Name En</label>
									<input type="text" class="form-control form-control-solid"
										placeholder="Shift Name En" value="{{old('name_en')}}" name="name_en">
									@error('name_en')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<label for="inputName">Shift Name Ar</label>
									<input type="text" class="form-control form-control-solid"
										placeholder="Shift Name Ar" value="{{old('name_ar')}}" name="name_ar">
									@error('name_ar')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="col">
									<label for="inputName">Time From</label>
									<input type="time" class="form-control form-control-solid" placeholder="Time From"
										value="{{old('from')}}" name="from">
									@error('from')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<label for="inputName">Time To</label>
									<input type="time" class="form-control form-control-solid" placeholder="Time To"
										value="{{old('to')}}" name="to">
									@error('to')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<br>
							<div class="form-row">
								<div class="col">
									{{-- input ckeck box --}}
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="sat"
											name="days[]">
										<label class="form-check-label" for="inlineCheckbox1">sat</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="sun"
											name="days[]">
										<label class="form-check-label" for="inlineCheckbox1">sun</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="mon"
											name="days[]">
										<label class="form-check-label" for="inlineCheckbox1">mon</label>
									</div>
									{{-- input ckeck box --}}
									@error('days')
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