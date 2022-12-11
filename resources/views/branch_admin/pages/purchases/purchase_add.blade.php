@extends('branch_admin.layouts.master')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="main-title">
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Purchase</h1>
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
					<h5 class="card-title">Form Purchase</h5>
				</div>
				<form action="{{route('branch_admin_purchases.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputName">Branch</label>
							<select id="country-dd" class="form-control" name="branch_id">
								<option value="">Select Branches</option>
								@foreach ($branches as $branch)
								<option value="{{$branch->branch_id}}" {{(old('branch_id')==$branch->id)?
									'selected':''}}>{{$branch->Branch->name}}</option>
								@endforeach
							</select>
							@error('branch_id')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="inputName">Medicins</label>
							<select id="country-dd" class="form-control" name="medicin_id">
								<option value="">Select Medicin</option>
								@foreach ($medicins as $medicin)
								<option value="{{$medicin->id}}" {{(old('medicin_id')==$medicin->id)?
									'selected':''}}>{{$medicin->name}}</option>
								@endforeach
							</select>
							@error('medicin_id')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="form-row">

						<div class="form-group col-md-6">
							<label for="inputName">Acd Custom Item</label>
							<input type="text" class="form-control form-control-solid" placeholder="Acd Custom Item"
								value="{{old('acd')}}" name="acd">
							@error('acd')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="inputState">Due Date</label>
							<input type="date" class="form-control form-control-solid" placeholder="Due Date"
								value="{{old('due_date')}}" name="due_date">
							@error('due_date')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputState">Type Of Measurement</label>
							<input type="text" class="form-control form-control-solid" placeholder="Type Of Measurement"
								value="{{old('type_measurement')}}" name="type_measurement">
							@error('type_measurement')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="inputState">Price</label>
							<input type="text" class="form-control form-control-solid" placeholder="Price"
								value="{{old('price')}}" name="price">
							@error('price')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>

					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputState">Qty</label>
							<input type="text" class="form-control form-control-solid" placeholder="qty"
								value="{{old('qty')}}" name="qty">
							@error('qty')
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


@endsection