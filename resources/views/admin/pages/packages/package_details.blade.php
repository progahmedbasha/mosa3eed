@extends('admin.layouts.master')
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="main-title">
         <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Edit Package</h1>
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
               <h5 class="card-title">Form Package</h5>
            </div>
            <form action="{{route('packages.update',$package->id)}}" method="post" enctype="multipart/form-data">
               @csrf
               @method('patch')
               <div class="form-row">
                  <div class="col">
                     <label for="inputName">Subject</label>
                      <input type="text" class="form-control form-control-solid" placeholder="Subject" value="{{$package->subject}}" name="subject">
                        @error('subject')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   
                  </div>
                  <div class="col">
                     <label for="inputName">Number Of Days</label>
                      <input type="text" class="form-control form-control-solid" placeholder="number_days" value="{{$package->number_days}}" name="number_days">
                        @error('number_days')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                  </div>
               </div>
               <br>
               <div class="form-row">
                  <div class="col">
                     <label for="inputName">Status</label>
                    <select class="form-control" name="status">
                          <option value="{{$package->status}}" {{($package->status == $package->status)? 'selected' : '' }}>{{$package->status}}</option>
                           <option value="Active">Active</option>
                           <option value="Not Active">Not Active</option>
                        </select>
                        @error('status')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                  </div>
                  <div class="col">
                     <label for="inputName">User Type</label>
                    <select class="form-control" name="user_type_id">
                          <option value="">Select User Type</option>
                           @foreach ($user_types as $user_type)
                           <option value="{{$user_type->id}}" {{($package->user_type_id==$user_type->id)? 'selected':''}}>{{$user_type->name}}</option>
                           @endforeach
                        </select>
                        @error('user_type_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror  
                  </div>
               </div>
               <br>
               <div class="form-row">
                  <div class="col">
                     <label for="inputName">Price</label>
                       <input type="text" class="form-control form-control-solid" placeholder="Price" value="{{$package->price}}" name="price">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror 
                  </div>
                  <div class="col">
                     <label for="inputName">Offer</label>
                     <input type="text" class="form-control form-control-solid" placeholder="Offer" value="{{$package->offer}}" name="offer">
                        @error('offer')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror   
                  </div>
               </div>
               <br>
                <div class="form-row">
                  <div class="col">
                     <label for="inputName">Description</label>
                   <textarea class="form-control" aria-label="With textarea" value="{{$package->description}}" name="description">{{$package->description}}</textarea>
                        @error('description')
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