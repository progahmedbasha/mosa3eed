@extends('admin.layouts.master')
@section('content')

<div id="content-wrapper">
	<div class="container-fluid pb-0">
		<div class="top-category section-padding mb-4">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Job Title</h1>
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
							<h5 class="card-title">Form Job Title</h5>
						</div>
						<form action="{{route('job_titles.store')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-row">
								<div class="col">
									<label for="inputName">Name En</label>
									<input type="text" class="form-control form-control-solid" placeholder="Name En"
										value="{{old('name_en')}}" name="name_en">
									@error('name_en')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="inputName">Name Ar</label>
									<input type="text" class="form-control form-control-solid" placeholder="Name Ar"
										value="{{old('name_ar')}}" name="name_ar">
									@error('name_ar')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputName">Related To</label>
									<select class="form-control" name="related_to">
										<option value="">Select</option>
										<option value="Pharmacy">Pharmacy</option>
										<option value="Store">Store</option>
									</select>
									@error('related_to')
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