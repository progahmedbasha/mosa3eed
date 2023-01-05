@extends('admin.layouts.master')
@section('content')

<div id="content-wrapper">
	<div class="container-fluid pb-0">
		<div class="top-category section-padding mb-4">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Effective Material</h1>
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
						</div>
						<form action="{{route('suppliers.update',$supplier->id)}}" method="post" enctype="multipart/form-data">
							@csrf
							@method('patch')
							<div class="form-row">
								<div class="col">
									<label for="inputName">Name</label>
									<input type="text" class="form-control form-control-solid" placeholder="Name En"
										value="{{$supplier->name}}" name="name">
									@error('name')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="inputName">Email</label>
									<input type="text" class="form-control form-control-solid" placeholder="Name Ar"
										value="{{$supplier->email}}" name="email">
									@error('email')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<br>
							<div class="form-row">
								<div class="col">
									<label for="inputName">Phone</label>
									<input type="text" class="form-control form-control-solid" placeholder="Name En"
										value="{{$supplier->phone}}" name="phone">
									@error('phone')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="col">
									<label for="inputName">Photo</label>
									<div class="col" >
									<input type="file" class="custom-file-input" id="validatedCustomFile"
										value="{{old('photo')}}" name="photo">
									<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
									<div class="invalid-feedback">Example invalid custom file feedback</div>
								</div>
								</div>
							</div>
					
							<br>
							<button type="submit" class="btn btn-primary">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
				{{--div for show photo --}}
		<br>
		<div class="row">
			<div class="col-xl-12 mb-30">
				<div class="card card-statistics h-100">
					<div class="card-body">
						@if(!empty($supplier->photo))
						<img src="{{url('/data/suppliers')}}/{{$supplier->photo }}" class="w3-round"
							width="200px" alt="Norway">
						@else
						<img src="{{url('/data/error.png')}}" class="w3-round" width="200px" alt="Norway">
						@endif
					</div>
				</div>
			</div>
		</div>
		{{--div for show photo --}}
		<hr>
	</div>
</div>
</div>

@endsection