@extends('admin.layouts.master')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="main-title">
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Edit Missed Item</h1>
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
					<h5 class="card-title">Form Missed Item</h5>
				</div>
				<form action="{{route('missed_items.update',$missed_item->id)}}" method="post"
					enctype="multipart/form-data">
					@csrf
					@method('patch')
					<div class="form-row">
						<div class="col">
							<label for="inputName">User</label>
							<select id="country-dd" class="form-control" name="user_id">
								<option value="">Select User</option>
								@foreach ($users as $user)
								<option value="{{$user->id}}" {{($missed_item->user_id==$user->id)?
									'selected':''}}>{{$user->name}}</option>
								@endforeach
							</select>
							@error('user_id')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="col">
							<label for="inputName">Branch</label>
							<select id="country-dd" class="form-control" name="branch_id">
								<option value="">Select Branch</option>
								@foreach ($branches as $branch)
								<option value="{{$branch->id}}" {{($missed_item->branch_id==$branch->id)?
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
							<label for="inputName">Medicins</label>
							<select id="country-dd" class="form-control" name="medicin_id">
								<option value="">Select Medicins</option>
								@foreach ($medicins as $medicin)
								<option value="{{$medicin->id}}" {{($missed_item->medicin_id==$medicin->id)?
									'selected':''}}>{{$medicin->name}}</option>
								@endforeach
							</select>
							@error('medicin_id')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="col">
							<label for="inputName">Status</label>
							<select class="form-control"  name="status">
								<option value="{{$missed_item->status}}" {{($missed_item->status ==
									$missed_item->status)? 'selected' : '' }}>{{$missed_item->status}}</option>
								<option value="Active">Active</option>
								<option value="Not Active">Not Active</option>
							</select>
							@error('status')
							<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<label for="inputName">Notes</label>
							<textarea class="form-control" aria-label="With textarea" value="{{$missed_item->notes}}"
								name="notes">{{$missed_item->notes}}</textarea>
							@error('notes')
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