@extends('admin.layouts.master')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="main-title">
			<h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Organization Admin</h1>
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
					<h5 class="card-title">Form Organization Admin</h5>
				</div>
				<form action="{{route('organization_admins.update',$org_admin->id)}}" method="post" enctype="multipart/form-data">
					@csrf
               @method('patch')
					<div class="form-row">
						<div class="col">
							<label for="inputName">Organization</label>
							<select  id="country-dd" class="form-control" name="organization_id">
                        <option value="{{$org_admin->organization_id}}" {{($org_admin->organization_id == $org_admin->organization_id)? 'selected' : '' }}>{{$org_admin->Organization->name}}</option>
                           @foreach ($organizations as $org)
                           <option value="{{$org->id}}" {{(old('organization_id')==$org->id)? 'selected':''}}>{{$org->name}}</option>
                           @endforeach
                        </select>
                        @error('organization_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
						</div>
						<div class="col">
							<label for="inputName">User</label>
							<select  id="country-dd" class="form-control" name="user_id">
                        <option value="{{$org_admin->user_id}}" {{($org_admin->user_id == $org_admin->user_id)? 'selected' : '' }}>{{$org_admin->User->name}}</option>
                           @foreach ($users as $user)
                           <option value="{{$user->id}}" {{(old('user_id')==$user->id)? 'selected':''}}>{{$user->name}}</option>
                           @endforeach
                        </select>
                        @error('user_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
						</div>
					</div>
					<br>
					<div class="form-row">
						<div class="col">
							<label for="inputName">Branches</label>
						  {{-- if first for send specifi branches only , second if for send all branches --}}
                        @if($org_admin->type =="Branch Admin")
                            <select  id="country-dd" class="form-control"style="padding: 10px;" name="branch_id[]" multiple>
                                    <option value="">Select Branches</option>
                                    @foreach ($user_branch as $branch)
                                    <option value="{{$branch->branch_id}}" selected>{{$branch->Branch->name}}</option>
                                    @endforeach
                            </select>
                        @endif
                        @if($org_admin->type =="Organization Admin")
                            <select  id="country-dd" class="form-control"style="padding: 10px;" name="branch_id[]" multiple>
                                    <option value="" selected>Select Branches</option>
                                    @foreach ($user_branch as $branch)
                                    <option value="{{$branch->branch_id}}" >{{$branch->Branch->name}}</option>
                                    @endforeach
                            </select>
                        @endif
                        @error('branch_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   		
						</div>
						<div class="col">
							<label for="inputName">Shift</label>
							<select id="country-dd" class="form-control" name="organization_shift_id">
								<option value="">Select shift</option>
								@foreach ($shifts as $shift)
								<option value="{{$shift->id}}" {{(old('organization_shift_id')==$shift->id)?
									'selected':''}}>{{$shift->name}}</option>
								@endforeach
							</select>
							@error('organization_shift_id')
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