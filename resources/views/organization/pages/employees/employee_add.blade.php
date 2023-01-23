@extends('organization.layouts.master')
@section('content')

<div id="content-wrapper">
   <div class="container-fluid pb-0">
      <div class="top-category section-padding mb-4">
         <div class="row">
            <div class="col-md-12">
               <div class="main-title">
                  <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Add New Employee</h1>
               </div>
            </div>
         </div>
      </div>
      <hr>
      <form action="{{route('org_employees.store')}}" method="post" enctype="multipart/form-data">
         @csrf
         <div class="row">
            <div class="col-sm-6">
               <div class="card">
                  <div class="card-body">
                     <div class="col">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" placeholder="Name" value="{{old('name')}}" name="name"
                           required />
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="col">
                        <label for="inputName">Phone</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Phone"
                           value="{{old('phone')}}" name="phone">
                        @error('phone')
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
                        <label for="inputState">Organizations</label>
                        <select id="organization" class="form-control organization_id" name="organization_id">
                           <option value="">Select Organization</option>
                           @foreach($organizations as $organization)
                           <option value="{{$organization->id}}" {{(old('organization_id')==$organization->id)?
                              'selected':''}}>{{$organization->name}}</option>
                           @endforeach
                        </select>
                        @error('organization_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="col">
                        <label for="inputState">Branch</label>
                        <select id="inputState" class="form-control" name="branch_id">
                           <option value="">Select Branch</option>
                           @foreach($branches as $branch)
                           <option value="{{$branch->id}}" {{(old('organization_id')==$branch->id)?
                              'selected':''}}>{{$branch->name}}</option>
                           @endforeach
                        </select>
                        @error('branch_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                  

                  </div>
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