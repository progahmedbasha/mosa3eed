@extends('admin.layouts.master')
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
      <div class="row">
         <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
               <div class="card-body">

                  <form action="{{route('employees.store')}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="form-row">
                        <div class="col">
                           <label for="inputName">Name</label>
                           <input type="text" class="form-control" placeholder="Name" value="{{old('name')}}"
                              name="name" required />
                           @error('name')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <label for="inputName">Phone</label>
                           <input type="text" class="form-control" id="inputName" placeholder="Phone"
                              value="{{old('phone')}}" name="phone">
                           @error('phone')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="inputState">Organization</label>
                           <select id="inputState" class="form-control" name="organization_id">
                              <option value="">Select Organization</option>
                              @foreach($organizations as $org)
                              <option value="{{$org->id}}" {{(old('organization_id')==$org->id)?
                                 'selected':''}}>{{$org->name}}</option>
                              @endforeach
                           </select>
                           @error('organization_id')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <label for="inputState">Branch</label>
                           <select id="inputState" class="form-control" name="branch_id">
                              <option value="">Select Branch</option>
                              @foreach($branches as $branch)
                              <option value="{{$branch->id}}" {{(old('organization_id')==$branch->id)?
                                 'selected':''}}>{{$branch->name}}</option>
                              @endforeach
                           </select>
                           @error('organization_id')
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