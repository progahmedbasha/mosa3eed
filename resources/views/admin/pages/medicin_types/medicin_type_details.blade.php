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
						<form action="{{route('medicin_types.update',$medicin_type->id)}}" method="post" enctype="multipart/form-data">
							@csrf
                            @method('patch')
							<div class="form-row">
								<div class="col">
									<label for="inputName">Type En</label>
									<input type="text" class="form-control form-control-solid" placeholder="Type En"
										value="{{$medicin_type->getTranslation('type', 'en')}}" type="type_en">
									@error('name_en')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="inputName">Type Ar</label>
									<input type="text" class="form-control form-control-solid" placeholder="Type Ar"
										value="{{$medicin_type->getTranslation('type', 'ar')}}" name="type_ar">
									@error('type_ar')
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