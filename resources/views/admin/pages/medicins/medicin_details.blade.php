@extends('admin.layouts.master')
@section('content')

<div id="content-wrapper">
	<div class="container-fluid pb-0">
		<div class="top-category section-padding mb-4">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Edit Medicin</h1>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<form action="{{route('medicins.update',$medicin->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('patch')
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-list"></i> Name :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputName">Name En</label>
								<input type="text" class="form-control" placeholder="Name En"
									value="{{$medicin->getTranslation('name', 'en')}}" name="name_en">
								@error('name_en')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputName">Name Ar</label>
								<input type="text" class="form-control" placeholder="Name Ar"
									value="{{$medicin->getTranslation('name', 'ar')}}" name="name_ar">
								@error('name_ar')
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
								<h6 class="card-title"><i class="fa fa-list"></i> Details :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputState">Effective Material</label>
								<select id="inputState" class="form-control" name="effective_material_id">
									<option value="">Select Effective Material</option>
									@foreach($effective_materials as $effective_material)
									<option value="{{$effective_material->id}}" {{($medicin->
										effective_material_id==$effective_material->id)?
										'selected':''}}>{{$effective_material->name}}</option>
									@endforeach
								</select>
								@error('effective_material_id')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">Medicin Shape</label>
								<select id="inputState" class="form-control" name="medicin_shape_id">
									<option value="">Select Medicin Shape</option>
									@foreach($medicin_shapes as $medicin_shape)
									<option value="{{$medicin_shape->id}}" {{($medicin->
										medicin_shape_id==$medicin_shape->id)?
										'selected':''}}>{{$medicin_shape->name}}</option>
									@endforeach
								</select>
								@error('medicin_shape_id')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>

						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-6">
					<div class="card">
						<div class="card-body">
							<div class="col">
								<h6 class="card-title"><i class="fa fa-cog"></i> Setting :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputName">Barcode</label>
								<input type="text" class="form-control" placeholder="Barcode"
									value="{{$medicin->barcode}}" name="barcode">
								@error('barcode')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputName">Tags</label>
								<input type="text" class="form-control" placeholder="Tags" value="{{$medicin->tags}}"
									name="tags">
								@error('tags')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputName">Description</label>
								<input type="text" class="form-control" placeholder="Description"
									value="{{$medicin->description}}" name="description">
								@error('description')
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
								<h6 class="card-title"><i class="fa fa-cog"></i> Setting :</h6>
								<hr>
							</div>
							<div class="col">
								<label for="inputState">Producing Company</label>
								<input type="text" class="form-control" placeholder="Producing Company"
									value="{{$medicin->producing_company}}" name="producing_company">
								@error('producing_company')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputState">Medicin Type</label>
								<select id="inputState" class="form-control" name="medicin_type_id">
									<option value="">Select Medicin Type</option>
									@foreach($medicin_types as $medicin_type)
									<option value="{{$medicin_type->id}}" {{($medicin->
										medicin_type_id==$medicin_type->id)?
										'selected':''}}>{{$medicin_type->type}}</option>
									@endforeach
								</select>
								@error('medicin_type_id')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="col">
								<label for="inputName">Expected Discount</label>
								<input type="text" class="form-control" placeholder="Expected Discount"
									value="{{$medicin->expected_discount}}" name="expected_discount">
								@error('expected_discount')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>

						</div>
					</div>
				</div>
			</div>
			<br>
		 <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="col">
                                <h6 class="card-title"><i class="fa fa-list"></i> Units:</h6>
                                <hr>
                            </div>
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead>
                                    <tr>
                                        <th>Big Unit</th>
                                        <th>Center Unit</th>
                                        <th>Small Unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="number" class="form-control form-control-solid" value="{{ $medicin_unit->big}}"
                                                name="big">
                                            @error('big')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-solid"
                                                value="{{ $medicin_unit->center }}" name="center">
                                            @error('center')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-solid"
                                                value="{{ $medicin_unit->small }}" name="small">
                                            @error('small')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

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
@endsection