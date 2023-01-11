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
									<label for="inputName">Shift Name</label>
									<input type="text" class="form-control form-control-solid" placeholder="Shift Name"
										value="{{old('shift_name')}}" name="shift_name">
									@error('shift_name')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<input type="hidden" value="{{ $id }}" name="branch_id">
							<br>
							<div class="form-row">
								<div class="col">
									<label for="inputName">Days</label>
									<h4>Saturday :</h4>
									<input type="hidden" name="day[]" value="saturday">
								</div>
								<div class="col">
									<label for="inputName">Time From</label>
									<input type="time" class="form-control form-control-solid" placeholder="Time From"
										value="{{old('from')}}" name="from[]">
									@error('from')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<label for="inputName">Time To</label>
									<input type="time" class="form-control form-control-solid" placeholder="Time To"
										value="{{old('to')}}" name="to[]">
									@error('to')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="col">
									<h4>Sunday :</h4>
									<input type="hidden" name="day[]" value="sunday">
								</div>
								<div class="col">
									<input type="time" class="form-control form-control-solid" placeholder="Time From"
										value="{{old('from')}}" name="from[]">
									@error('from')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<input type="time" class="form-control form-control-solid" placeholder="Time To"
										value="{{old('to')}}" name="to[]">
									@error('to')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="col">
									<h4>Monday :</h4>
									<input type="hidden" name="day[]" value="Monday">
								</div>
								<div class="col">
									<input type="time" class="form-control form-control-solid" placeholder="Time From"
										value="{{old('from')}}" name="from[]">
									@error('from')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<input type="time" class="form-control form-control-solid" placeholder="Time To"
										value="{{old('to')}}" name="to[]">
									@error('to')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="col">
									<h4>Tuesday :</h4>
									<input type="hidden" name="day[]" value="Tuesday">
								</div>
								<div class="col">
									<input type="time" class="form-control form-control-solid" placeholder="Time From"
										value="{{old('from')}}" name="from[]">
									@error('from')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<input type="time" class="form-control form-control-solid" placeholder="Time To"
										value="{{old('to')}}" name="to[]">
									@error('to')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="col">
									<h4>Wednesday :</h4>
									<input type="hidden" name="day[]" value="Wednesday">
								</div>
								<div class="col">
									<input type="time" class="form-control form-control-solid" placeholder="Time From"
										value="{{old('from')}}" name="from[]">
									@error('from')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<input type="time" class="form-control form-control-solid" placeholder="Time To"
										value="{{old('to')}}" name="to[]">
									@error('to')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="col">
									<h4>Thursday :</h4>
									<input type="hidden" name="day[]" value="Thursday">
								</div>
								<div class="col">
									<input type="time" class="form-control form-control-solid" placeholder="Time From"
										value="{{old('from')}}" name="from[]">
									@error('from')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<input type="time" class="form-control form-control-solid" placeholder="Time To"
										value="{{old('to')}}" name="to[]">
									@error('to')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="col">
									<h4>Friday :</h4>
									<input type="hidden" name="day[]" value="Friday">
								</div>
								<div class="col">
									<input type="time" class="form-control form-control-solid" placeholder="Time From"
										value="{{old('from')}}" name="from[]">
									@error('from')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<input type="time" class="form-control form-control-solid" placeholder="Time To"
										value="{{old('to')}}" name="to[]">
									@error('to')
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