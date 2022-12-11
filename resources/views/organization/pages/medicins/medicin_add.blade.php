@extends('organization.layouts.master')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="main-title">
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New User</h1>
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
					<h5 class="card-title">Form Medicin</h5>
				</div>
				<form action="{{route('organization_medicins.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-row">
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
							<input type="text" class="form-control" placeholder="Name Ar" value="{{old('name_ar')}}"
								name="name_ar" required />
							@error('name_ar')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="inputCity">Barcode</label>
							<input type="text" class="form-control" placeholder="barcode" value="{{old('barcode')}}"
								name="barcode">
							@error('barcode')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group col-md-6">
							<label for="inputCity">Price</label>
							<input type="text" class="form-control form-control-solid" placeholder="Price"
								value="{{old('price')}}" name="price">
							@error('price')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>
</div>
<hr>
@endsection