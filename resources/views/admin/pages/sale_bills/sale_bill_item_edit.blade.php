@extends('admin.layouts.master')
@section('content')
<div id="content-wrapper">
	<div class="container-fluid pb-0">
		<div class="top-category section-padding mb-4">
			<div class="row">
				<div class="col-md-12">
					<div class="main-title">
						<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Edit Item</h1>
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
							<h5 class="card-title">Form Item</h5>
						</div>
						<form action="{{route('item_update',$bill_item->id)}}" method="post"
							enctype="multipart/form-data">
							@csrf
							@method('patch')
							<div class="form-row">
								<div class="col">
									<input type="hidden" value="{{$bill_number->id}}" name="bill_number">
									<label for="inputName">Medicn</label>
									<select class="form-control" name="medicin_id">
										<option value="">Choose Medicin</option>
										@foreach ($medicins as $medicin)
										<option value="{{$medicin->id}}" {{($bill_item->medicin_id==$medicin->id)?
											'selected':''}}>{{$medicin->name}}</option>
										@endforeach
									</select>
									@error('medicin_id')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group col-md-6">
									<label for="inputName">Price</label>
									<input type="text" class="form-control form-control-solid" placeholder="Price"
										value="{{$bill_item->price}}" name="price">
									@error('price')
									<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputName">Qty</label>
									<input type="text" class="form-control form-control-solid" placeholder="Qty"
										value="{{$bill_item->qty}}" name="qty">
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
	</div>
</div>
</div>

@endsection